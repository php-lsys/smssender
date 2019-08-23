<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS;
use LSYS\SMSSender\Utils;
use LSYS\SMSSender\Handler;
use function LSYS\SMSSender\__;
class SMSSender{
	/**
	 * @var Config
	 */
	protected $_config;
	/**
	 * @var Handler
	 */
	protected $_handler;
	/**
	 * @param Config $config
	 */
	public function __construct(Config $config){
		$handler=$config->get("handler",NULL);
		if ($handler==null){
		    throw new Exception ( __('smssender handler not defined in [:name] configuration',array(":name"=>$config->name()) ));
		}
		if (!class_exists($handler,true)||!in_array(\LSYS\SMSSender\Handler::class,class_parents($handler))){
		    throw new Exception(__("smssender handler [:handler] wong,not extends \LSYS\SMSSender\Handler",array(":handler"=>$handler)));
		}
		$this->_handler=new $handler($config);
		$this->_config=$config;
		$this->addZoneCheck("86",array(Utils::class,"chinaPhone"));
	}
	/**
	 * get sms handler
	 * @return \LSYS\SMSSender\Handler
	 */
	public function getHandler(){
		return $this->_handler;
	}
	/**
	 * send sms
	 * return send msg id
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 * @param string $zone
	 * @throws Exception
	 * @return string 
	 */
	public function send($mobile,$name,array $data=array(),$zone='86'){
		$zones=array_keys(Utils::zone());
		if (!in_array($zone,$zones)) throw new Exception(__("your submit zone is wrong [:zone]",array(":zone"=>strip_tags($zone))));
		if (isset($this->_zone_check[$zone])){
			$check=call_user_func($this->_zone_check[$zone],$mobile);
		}else $check=(strlen(preg_replace('/\D+/', '', $mobile))==11||strlen(preg_replace('/\D+/', '', $mobile))==7);
		if (!$check) throw new Exception(__("this phone [:phone] is not valid",array(":phone"=>strip_tags($mobile))));
		return $this->_handler->send($zone,$mobile,$name,$data);
	}
	/**
	 * @var array
	 */
	protected $_zone_check=array();
	/**
	 * add zone mobile number check callback
	 * @param string $zone
	 * @param callable $callback
	 */
	public function addZoneCheck($zone,$callback){
		if (!is_callable($callback))return false;
		$this->_zone_check[$zone]=$callback;
		return $this;
	}
}
