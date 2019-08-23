<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender\Render;
use LSYS\SMSSender\Render;
use LSYS\Exception;
use function LSYS\SMSSender\__;

class Simple extends Render{
	/**
	 * {@inheritDoc}
	 * @see \LSYS\SMSSender\Render::body()
	 */
	public function body($name,array $values=array()){
		$tpls=$this->_config->get("tpls",array());
		if (!isset($tpls[$name])) throw new Exception(__("sms :name tpl not exist",array(":name"=>$name)));
		$values=array_map('strval', $values);
		return strtr($tpls[$name], $values);
	}	
}