<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender;
use LSYS\Config;
abstract class Render{
	/**
	 * @var Config
	 */
	protected $_config;
	/**
	 * @param Config $config
	 */
	public function __construct(Config $config){
		$this->_config=$config;
	}
	/**
	 * render sms body
	 * @param string $name
	 * @param array $values
	 */
	abstract public function body($name,array $values=array());
}