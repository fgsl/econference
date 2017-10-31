<?php
namespace Credenciamentos\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
class CredenciadoTable
{
	private $tableGateway;
	
	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function save($model)
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
	
	public function getOne($codigo)
	{
		$credenciamentos = $this->getAll(['codigo' => $codigo]);
		return $credenciamentos->current();
	}
		
}