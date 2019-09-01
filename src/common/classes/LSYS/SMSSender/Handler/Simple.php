<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender\Handler;
use LSYS\SMSSender;
use LSYS\Config;
use LSYS\SMSSender\Handler;
/**
 * 短信实现接口
 * @author lonely
 */
class Simple extends Handler{
	/**
	 * @var \LSYS\SMSSender\Render\Simple
	 */
	protected $_render;
	/**
	 * @param Config $config
	 */
	public function __construct(Config $config){
		parent::__construct($config);
		$this->_render=new \LSYS\SMSSender\Render\Simple($config);
	}
	/**
	 * @param string $zone
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 */
	public function send($zone,$mobile,$name,array $data=array()){
		$body=$this->_render->body($name,$data);
		if(!headers_sent()){
		    header("SMS-Name:{$name}");
		    header("SMS-Zone:{$zone}");
		    header("SMS-Moblie:{$mobile}");
		    header("SMS-Body:{$body}");
		}
		return true;
	}
}