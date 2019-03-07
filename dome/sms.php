<?php
include __DIR__."/Bootstarp.php";
include __DIR__."/MyHandler.php";
// \LSYS\SMSSender\DI::set(new class extends \LSYS\SMSSender\DI{
//     public function smsConfig(){
//         return new File("sms.myhandler");
//     }
// });
//等价于\LSYS\SMSSender\DI::$config="sms.myhandler";
$sender=\LSYS\SMSSender\DI::get()->smsSender();
var_dump($sender->send("13510461174","name_dome",array('code'=>'8888','time'=>'1')));