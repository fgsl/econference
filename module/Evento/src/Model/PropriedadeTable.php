<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

use Ftsl\Model\AbstractTable;

class PropriedadeTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'propriedades';

    protected function getSelect()
    {
        $select = parent::getSelect();
        $select->columns(['codigo','nome','codigo_edicao']);
        $select->join('edicoes', 'propriedades.codigo_edicao=edicoes.codigo',['edicao' => 'edicao']);
        return $select;
    }
}