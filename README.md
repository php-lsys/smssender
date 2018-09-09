# 短信发送封装
> 实现短信发送的统一封装,使业务逻辑不必关心短信发送的具体实现
> 代码层只设置短信内容中的变量部分,实现多种短信接口的适配
> 已实现发送适配: 阿里大于, yuntongxun.com  

使用示例:
```php
//如果不是使用 阿里大于, yuntongxun.com的短信接口,可参见以下实现自定义发送接口
//自定义适配实现示例 /dome/MyHandler.php
use LSYS\SMSSender;
use LSYS\Config\File;
include __DIR__."/Bootstarp.php";
include __DIR__."/MyHandler.php";
$config= new File("sms.myhandler");
$sess=\LSYS\SMSSender\DI::get()->mailer();
var_dump($sender->send("13510460000","name_dome",array('code'=>'8888','time'=>'1')));
```