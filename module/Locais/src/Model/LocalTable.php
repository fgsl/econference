<?php
namespace Locais\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
class LocalTable
{
	private $tableGateway;
	
	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function save($model)
	{
		$set = $model->toArray();
		
		$this->tableGateway->insert($set);
	}
	
	public function getAll()
	{
		$select = new Select('locais');
		$select->order('codigo');
		return $this->tableGateway->selectWith($select);
	}
}