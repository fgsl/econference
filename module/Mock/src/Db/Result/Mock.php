<?php
namespace Mock\Db\Result;
use Zend\Db\Adapter\Driver\ResultInterface;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements ResultInterface
{
	private $elements = [null];
	private $index = 0;
	
	/**
	 * Force buffering
	 *
	 * @return void
	 */
	public function buffer()
	{
		
	}
	
	/**
	 * Check if is buffered
	 *
	 * @return bool|null
	*/
	public function isBuffered()
	{
		return null;
	}
	
	/**
	 * Is query result?
	 *
	 * @return bool
	*/
	public function isQueryResult()
	{
		return true;
	}
	
	/**
	 * Get affected rows
	 *
	 * @return int
	*/
	public function getAffectedRows()
	{
		return 1;
	}
	
	/**
	 * Get generated value
	 *
	 * @return mixed|null
	*/
	public function getGeneratedValue()
	{
		return null;
	}
	
	/**
	 * Get the resource
	 *
	 * @return mixed
	*/
	public function getResource()
	{
		return null;
	}
	
	/**
	 * Get field count
	 *
	 * @return int
	*/
	public function getFieldCount()
	{
		return 1;
	}
	
	public function count () 
	{
	    return count($this->elements);
	}

    public function current ()
    {
        return $this->elements[$this->index];
    }

    public function next ()
    {
        $this->index++;
    }

    public function key () 
    {
        return $this->index;
    }

    public function valid ()
    {
        return isset($this->elements[$this->index]);
    }

    public function rewind () 
    {
        $this->index = 0;
    }
}