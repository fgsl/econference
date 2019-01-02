<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace AcessoTest\Controller;

use ApplicationTest\Controller\AbstractCrudControllerTest;

class UsuariosControllerTest extends AbstractCrudControllerTest
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->route = 'usuarios';
        $this->module = 'Acesso';
        $this->controller = 'Acesso\Controller\UsuariosController';
        $this->getData = ['codigo'=>1];
        $this->postData = ['codigo' => 42, 'nome' => 'Zaphod Beeblebrox','codigo_perfil' => 2];
        $this->expectedEditStatusCode = 500;
    }
}
