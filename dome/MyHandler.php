<?php
use LSYS\SMSSender\Handler;
class MyHandler extends Handler{
	public function __construct($config){
		parent::__construct($config);
	}
	/**
	 * @param string $zone
	 * @param string $mobile
	 * @param string $name
	 * @param array $data
	 */
	public function send(string $zone,string $mobile,string $name,array $data=array()){
		//实现短信发送
	}
}