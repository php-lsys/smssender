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
	"yuntongxun"=>array(
		"handler"=>\LSYS\SMSSender\Handler\YunTongXun::class,
		"server"=>'app.cloopen.com',
		"port"=>'8883',
		"version"=>'2013-12-26',
		"sid"=>'',
		"appid"=>'',
		"token"=>'',
		'sms_map'=>array()//array('name_dome'=>'1')
	)
);