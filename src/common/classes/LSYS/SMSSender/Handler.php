<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender;
use LSYS\Config;
/**
 * 短信实现接口
 * @author lonely
 */
abstract class Handler{
	/**
	 * @var Config
	 */
	public $_config;
	/**
	 * @param Config $config
	 */
	public function __construct(Config $config){
		$this->_config=$config;
	}
	/**
	 * @param string $zone
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 * @return mixed send msg id
	 */
	abstract public function send(string $zone,string $mobile,string $name,array $data=array());
}