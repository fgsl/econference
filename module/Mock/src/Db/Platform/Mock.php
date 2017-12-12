<?php
namespace Mock\Db\Platform;
use Zend\Db\Adapter\Platform\PlatformInterface;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements PlatformInterface
{
	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return __CLASS__;
	}
	
	/**
	 * Get quote identifier symbol
	 *
	 * @return string
	*/
	public function getQuoteIdentifierSymbol()
	{
		return "'";
	}
	
	/**
	 * Quote identifier
	 *
	 * @param  string $identifier
	 * @return string
	*/
	public function quoteIdentifier($identifier)
	{
		return "'";
	}
	
	/**
	 * Quote identifier chain
	 *
	 * @param string|string[] $identifierChain
	 * @return string
	*/
	public function quoteIdentifierChain($identifierChain)
	{
		$identifierChain = (is_array($identifierChain) ? implode(',', $identifierChain) : $identifierChain);
		return "'$identifierChain'";
	}
	
	/**
	 * Get quote value symbol
	 *
	 * @return string
	*/
	public function getQuoteValueSymbol()
	{
		return "'";
	}
	
	/**
	 * Quote value
	 *
	 * Will throw a notice when used in a workflow that can be considered "unsafe"
	 *
	 * @param  string $value
	 * @return string
	*/
	public function quoteValue($value)
	{
		return "'$value'";
	}
	
	/**
	 * Quote Trusted Value
	 *
	 * The ability to quote values without notices
	 *
	 * @param $value
	 * @return mixed
	*/
	public function quoteTrustedValue($value)
	{
		return "'$value'";
	}
	
	/**
	 * Quote value list
	 *
	 * @param string|string[] $valueList
	 * @return string
	*/
	public function quoteValueList($valueList)
	{
		$valueList = (is_array($valueList) ? implode(',', $valueList) : $valueList);
		return "'$valueList'";
	}
	
	/**
	 * Get identifier separator
	 *
	 * @return string
	*/
	public function getIdentifierSeparator()
	{
		return ",";
	}
	
	/**
	 * Quote identifier in fragment
	 *
	 * @param  string $identifier
	 * @param  array $additionalSafeWords
	 * @return string
	*/
	public function quoteIdentifierInFragment($identifier, array $additionalSafeWords = [])
	{
		return "'";
	}	
}