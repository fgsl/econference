<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

use Ftsl\Model\AbstractTable;

class EdicaoTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'edicoes';

    protected function getSelect()
    {
        $select = parent::getSelect();
        $select->columns(['codigo','edicao','codigo_anfitria','encerrada']);
        $select->join('anfitrias', 'edicoes.codigo_anfitria=anfitrias.codigo',['anfitria' => 'nome']);
        return $select;
    }
}