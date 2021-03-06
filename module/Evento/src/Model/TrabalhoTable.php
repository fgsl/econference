<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

use Ftsl\Model\AbstractTable;

class TrabalhoTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'trabalhos';

    protected function getSelect()
    {
        $select = parent::getSelect();
        $select->columns(['codigo','resumo','codigo_categoria']);
        $select->join('categorias', 'trabalhos.codigo_categoria=categorias.codigo',['categoria' => 'nome']);
        return $select;
    }
}