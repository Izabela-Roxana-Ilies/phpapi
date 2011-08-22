<?php
class Content{
	private $template;
	private $global_vars;
	public function __construct(){
		require_once(SMARTY_SDK_PATH);
		$this->template = new Smarty();
		$this->template->setTemplateDir(TEMPLATE_PATH);
		$this->global_vars = array();
		$this->global_vars["session"] = $_SESSION;
		$this->global_vars["request"] = $_REQUEST;
		$this->global_vars["local"] = array(
			"copyright_year" => date("Y"),
			"now"=>time()
		);
	}
	public function AddVariable($key, $val){
		$this->template->assign($key, $val);
	}
	public function AddGlobalVar($key,$val){
		if(!isset($this->global_vars[$key])){
			$this->template->assign($key,$val);
			return true;
		}
		return false;
	}
	private function AddGlobals(){
		foreach($this->global_vars as $key => $val){
			$this->template->assign($key, $val);
		}
	}
	public function FetchContent($file){
		$this->AddGlobals();
		return $this->template->fetch($file);
	}
}
?>