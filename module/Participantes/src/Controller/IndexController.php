<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Participantes\Controller;

use Application\Controller\AbstractCrudController;

class IndexController extends AbstractCrudController
{
	protected $mainTableFactory = 'ParticipanteTable';
	
	protected $rowsObjectName = 'participantes';
	
	protected $primaryKeyName = 'codigo';
	
	protected $modelName = 'Participantes\Model\Participante';
	
	protected $routeName = 'participantes';
    
  
     public function getDataFromRequest()
     {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$usuario = $this->getRequest()->getPost('usuario');
    	$email = $this->getRequest()->getPost('email');
    	$nome = $this->getRequest()->getPost('nome');
    	$cidade = $this->getRequest()->getPost('cidade');
    	$telefone = $this->getRequest()->getPost('telefone');
    	$instituicao = $this->getRequest()->getPost('instituicao');
    	$cpf = $this->getRequest()->getPost('cpf');
    	$passaporte = $this->getRequest()->getPost('passaporte');
    	return [
    		'codigo' => $codigo,
    		'usuario' => $usuario,
    		'email' => $email,
    		'nome' => $nome,
    		'cidade' => $cidade,
    		'telefone' => $telefone,
    		'instituicao' => $instituicao,
    		'cpf' => $cpf,
    		'passaporte' => $passaporte
    	];
     }
}