<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

use Ftsl\Model\AbstractTable;

class AnfitriaTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'anfitrias';
}