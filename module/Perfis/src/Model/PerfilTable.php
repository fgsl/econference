<?php
namespace Perfis\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
class PerfilTable
{
	private $tableGateway;
	
	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function save($model)
	{
		$set = $model->toArray();
		
		if (empty($set['codigo'])){
			unset($set['codigo']);
			$this->tableGateway->insert($set);
		} else {
			$this->tableGateway->update($set,['codigo'=>$set['codigo']]);
		}
	}
	
	public function getAll($where = null)
	{
		$select = new Select('perfis');
		$select->order('codigo');
		if (!is_null($where)){
			$select->where($where);
		}
		return $this->tableGateway->selectWith($select);
	}
	
	public function getOne($codigo)
	{
		$perfis = $this->getAll(['codigo' => $codigo]);
		return $perfis->current();
	}
	
	public function delete($codigo)
	{
		$this->tableGateway->delete(['codigo' => $codigo]);
		return;
	}
	
	
	
	
	
	
}