<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender\Handler;
use LSYS\Exception;
use function LSYS\SMSSender\__ytx as __;
use LSYS\SMSSender\Handler;
use YUNTONGXUN\REST;
require_once __DIR__.'/../../../../libs/yuntongxun.com/CCPRestSmsSDK.php';
class YunTongXun extends Handler{
	/**
	 * @var REST
	 */
	private $rest;
	public function __construct($config){
		parent::__construct($config);
		$serverIP=$this->_config->get("server",'app.cloopen.com');
		$serverPort=$this->_config->get("port",'8883');
		$softVersion=$this->_config->get("version",'2013-12-26');
		$this->rest=new REST($serverIP,$serverPort,$softVersion);
	}
	/**
	 * @param string $zone
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 */
	public function send($zone,$mobile,$name,array $data=array()){
		$s_id=$this->_config->get("sid");
		$app_id=$this->_config->get("appid");
		$token=$this->_config->get("token");
		$rest=$this->rest;
		$rest->setAccount($s_id,$token);
		$rest->setAppId($app_id);
		// 发送模板短信
		$map=$this->_config->get("sms_map",array());
		$tpl=isset($map[$name])?$map[$name]:'1';
		$data=array_values($data);
		$result = $rest->sendTemplateSMS($mobile,$data,$tpl);
		if($result == NULL )  throw new Exception(__("send sms is fail"));//发送失败
		if($result->statusCode!=0) throw new Exception(__($result->statusMsg),$result->statusCode);//发送失败
		return @$result->TemplateSMS->smsMessageSid->__toString();
	}
}