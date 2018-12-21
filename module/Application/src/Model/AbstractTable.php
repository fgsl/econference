<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;

abstract class AbstractTable
{
    /** 
     * @var TableGatewayInterface
     */
    protected $tableGateway;
    /**
     * @var string
     */
    protected $keyName = null;
    /**
     * @var string
     */
    protected $orderName = null;
    /**
     * @var string
     */
    protected $tableName = null;

    /**
     * @param TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @param AbstractModel $model
     */
    public function save(AbstractModel $model)
    {
        $set = $model->toArray();

        if (empty($set[$this->keyName])){
            unset($set[$this->keyName]);
            $this->tableGateway->insert($set);
        } else {
            $this->tableGateway->update($set,[$this->keyName=>$set[$this->keyName]]);
        }
    }

    /**
     * @param string $where
     */
    public function getAll($where = null)
    {
        $select = new Select($this->tableName);
        $select->order(is_null($this->orderName) ? $this->keyName : $this->orderName);
        if (!is_null($where)){
            $select->where($where);
        }
        return $this->tableGateway->selectWith($select);
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function getOne($key)
    {
        $categorias = $this->getAll([$this->keyName => $key]);
        return $categorias->current();
    }

    /**
     * @param mixed $key
     * @return integer
     */
    public function delete($key)
    {
        return $this->tableGateway->delete([$this->keyName => $key]);
    }

    /**
     * @return integer 
     */
    public function count()
    {
        $select = new Select('anfitrias');
        $select->columns([new Expression("count({$this->keyName}) as total")]);
        $rows = $this->tableGateway->selectWith($select);
        return $rows->current()->total;
    }
}