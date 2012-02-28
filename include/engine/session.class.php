<?php
class Session{
	private $session_key = "";
	function __construct(){
		$this->start();
	}
	public function start(){
		session_start();
		if(isset($_REQUEST["session_key"]) && $_REQUEST["session_key"] != ""){
			$this->setKey($_REQUEST["session_key"]);
		}else{
			$this->session_key = session_id();
		}
	}
	public function startNew(){
		session_start();
		if(isset($_REQUEST["session_key"]) && $_REQUEST["session_key"] != ""){
			$this->setKey($_REQUEST["session_key"]);
		}else{
			session_regenerate_id();
			$this->session_key = session_id();
		}
	}
	public function setKey($session_key){
		$this->session_key = $session_key;
		session_id($this->session_key);
	}
	public function key(){
		return $this->session_key;
	}
	public function getVar($var_name){
		if(isset($_SESSION[$var_name]))
		{
			return $_SESSION[$var_name];
		}
		else
		{
			return NO;
		}
	}
	public function setVar($var_name, $var_value){
		$_SESSION[$var_name] = $var_value;
		return $_SESSION[$var_name];
	}
}