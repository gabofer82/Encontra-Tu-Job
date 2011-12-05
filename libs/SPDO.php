<?php
class SPDO extends PDO 
{
	private static $instance = null;
	//private static $conf_data = null;
	
	public function __construct() 
	{
		$config = Config::singleton();
		parent::__construct('mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'), $config->get('dbuser'), $config->get('dbpass'));
	}

	public static function singleton() 
	{
		if( self::$instance == null ) 
		{
			//self::setConfigData();//invento raro mio
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	private static function setConfigData()
	{
		self::$conf_data = Config::singleton();
	}
}
?>