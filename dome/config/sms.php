<?php
use function LSYS\SMSSender\__;
return array(
	"simple"=>array(
		"handler"=>\LSYS\SMSSender\Handler\Simple::class,
		'tpls'=>array(
			'name_dome'=>__('this is test sms,code is :code')
		)
	),
	"myhandler"=>array(
			"handler"=>\MyHandler::class,
			//your config..
	),
);