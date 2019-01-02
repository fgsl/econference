<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Ftsl\Model\AbstractTable;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class CredenciadoTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'credenciamentos';

    public function save(AbstractModel $model)
    {
        $set = $model->toArray();
        
        if (empty($set['codigo_participante'])&&empty($set['codigo_edicao'])){
            $this->tableGateway->insert($set);
        } 
    }

    public function getAll($where = null)
    {
        $select = new Select('credenciamentos');
        $select->join('participantes','credenciamentos.codigo_participante=participantes.codigo',['codigo','nome','email']);
        $select->join('edicoes','credenciamentos.codigo_edicao=edicoes.codigo',['codigo_edicao' => 'codigo']);
        $select->order('codigo'); 
        if (is_null($where)){
            $where = new Where();
        }
        $where->equalTo('edicoes.encerrada', false);
        $select->where($where);
        return $this->tableGateway->selectWith($select);
    }
}