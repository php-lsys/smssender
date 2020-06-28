<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender\Handler;
use LSYS\Exception;
use LSYS\SMSSender\Handler;
use LSYS\Config;
if(!class_exists('TopClient')){
	require_once __DIR__.'/../../../../libs/alidayu.com/TopSdk.php';
}
class AliDayu extends Handler{
	const TYPE_SMS=1;
	const TYPE_CALL=2;
	private $_client;
	private $_type;
	public function __construct(Config $config){
		parent::__construct($config);
		$key=$this->_config->get("key");
		$secret=$this->_config->get("secret");
		$c = new \TopClient;
		$c->appkey = $key;
		$c->secretKey = $secret;
		$this->_client = $c;
		$this->_type=self::TYPE_SMS;
	}
	public function setType($type){
		$this->_type=$type;
		return $this;
	}
	/**
	 * @param string $zone
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 * @return mixed
	 */
	public function send(string $zone,string $mobile,string $name,array $data=array()){
		foreach ($data as &$v){
			$v=strval($v);
		}
		switch ($this->_type){
			case self::TYPE_CALL:
				$map=$this->_config->get("tts_map",array());
				$tpl=isset($map[$name])?$map[$name]:'TTS_1234123';
				$show_phone=$this->_config->get("tts_phone");
				$req = new \AlibabaAliqinFcTtsNumSinglecallRequest;
				$req ->setExtend( "" );
				if (is_array($data)&&count($data)>0) $req ->setTtsParam( json_encode($data) );
				$req ->setCalledNum( $mobile );
				$req ->setCalledShowNum( $show_phone );
				$req ->setTtsCode( $tpl );
			break;
			case self::TYPE_SMS:
				$map=$this->_config->get("sms_map",array());
				$tpl=isset($map[$name])?$map[$name]:'SMS_00000001';
				$req = new \AlibabaAliqinFcSmsNumSendRequest;
				$sign_name=$this->_config->get("name");
				$req ->setExtend( "" );
				$req ->setSmsType( "normal" );
				$req ->setSmsFreeSignName($sign_name);
				if (is_array($data)&&count($data)>0) $req ->setSmsParam( json_encode($data) );
				$req ->setRecNum($mobile );
				$req ->setSmsTemplateCode( $tpl);
			break;
			default:throw new Exception(__("alidayu not support type :type",array(":type"=>$this->_type)));
		}
		$resp = $this->_client ->execute( $req );
		if (isset($resp->code)&&$resp->code)
		{
			throw new Exception(isset($resp->sub_msg)?$resp->sub_msg:$resp->msg);
		}
		return  strval($resp->request_id);
	}
}