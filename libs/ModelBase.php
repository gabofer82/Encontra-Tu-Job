<?php
abstract class ModelBase 
{
	protected $db;

	public function __construct()
	{
		$this->db = SPDO::singleton();
	}
}
?>