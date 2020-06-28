<?php
namespace LSYS\SMSSender;
/**
 * @method \LSYS\SMSSender smsSender($config=null)
 */
class DI extends \LSYS\DI{
    public static $config = 'sms.simple';
    /**
     * @return static
     */
    public static function get(){
        $di=parent::get();
        !isset($di->smsSender)&&$di->smsSender(new \LSYS\DI\ShareCallback(function($config=null){
            return $config?$config:self::$config;
        },function($config=null){
            $config=\LSYS\Config\DI::get()->config($config?$config:self::$config);
            return new \LSYS\SMSSender($config);
        }));
        return $di;
    }
}