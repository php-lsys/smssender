<?php
/**
 * lsys sms
 * 测试配置 未引入
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
use function LSYS\SMSSender\__;
return array(
	"alidayu"=>array(
		"handler"=>\LSYS\SMSSender\Handler\AliDayu::class,
		"name"=>'阿里测试',
		"tts_phone"=>'13510461174',
		"key"=>'',
		"secret"=>'',
		'sms_map'=>array(),//array('name_dome'=>'SMS_7785825')
		'tts_map'=>array(),//array('name_dome'=>'SMS_7785825')
	),
);