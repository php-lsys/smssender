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
	"simple"=>array(
		"handler"=>\LSYS\SMSSender\Handler\Simple::class,
		'tpls'=>array(
			'name_dome'=>__('this is test sms,code is :code')
		)
	),
);