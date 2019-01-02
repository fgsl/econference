<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Acesso\Model;

use Ftsl\Model\AbstractTable;

class PerfilTable extends AbstractTable
{
    protected $keyName = 'codigo';
    protected $tableName = 'perfis';

    public function delete($key)
    {
        if ($key > 3) // don't remove admin, speaker and attendee
        {
            return parent::delete($key);
        }
        return 0;
    }
    
}