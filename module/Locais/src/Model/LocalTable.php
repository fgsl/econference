<?php
namespace Locais\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
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
}