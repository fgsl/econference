<?php
use Application\Model\DatabaseSchema;
use Zend\Log\Logger;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
error_reporting(E_ERROR);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$configArray = [];

$globalConfig = (array) include('config/autoload/global.php');
$localConfig = (array) include('config/autoload/local.php');

$configArray = array_merge($globalConfig['db'], isset($localConfig['db']) ? $localConfig['db'] : []);

$logArray = array_merge($globalConfig['log']['Log\App'], isset($localConfig['log']['Log\App']) ? $localConfig['log']['Log\App'] : []);

$log = new Logger($logArray);

$adapter = new Adapter($configArray);

$sql = new Sql($adapter);

echo "\n" . str_repeat('=',80) . "\n";
echo "\nSistema de Gestão de Conferências\n";
echo "\n" . str_repeat('=',80) . "\n";
echo "\nCriando tabelas...\n";

DatabaseSchema::createTables($adapter, true, $log);