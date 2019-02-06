<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Model;

class Cidades
{
    /**
     * @var array
     */
    private static $lista = null;

    /**
     * @return array
     */
    public static function getUF()
    {
        return array_keys(self::getListaDeCidades());
    }

    /**
     * 
     * @param string $uf
     * @return array
     */
    public static function getCidadesPorUf($uf)
    {
        return self::getListaDeCidades()[$uf];
    }
    
    /**
     * @return array
     */
    public static function getListaDeCidades()
    {
        if (self::$lista == null)
        {
            $handle = fopen(realpath(__DIR__ . '/../../data/cities/cities.csv'),'r');
            while (!feof($handle))
            {
                $line = fgetcsv($handle);
                if (!isset(self::$lista[$line[0]]))
                {
                    self::$lista[$line[0]] = [];
                }
                self::$lista[$line[0]][] = $line[1];
            }
            fclose($handle);
        }
        return self::$lista;
    }
}