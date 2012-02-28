<?php
class Content{
	public $template;
	private $dynamic = array(
		"activity/list"=>YES
	);
	function __construct(){
		$this->template = new Smarty();
		$this->template->setTemplateDir(TEMPLATE_PATH);
	}
	public function isDynamic($request){
		$request = $this->trimPathSlashes($request);
		if(isset($this->dynamic[$request])){
			return $this->dynamic[$request];
		}
		return NO;
	}
	public function removePathLastSlash($path){
		if($path[strlen($path)-1] == "/"){
			$path = substr($path,0,strlen($path)-1);
		}
		return $path;
	}
	public function removePathFirstSlash($path){
		if($path[0] == "/"){
			$path = substr($path,1,strlen($path)-1);
		}
		return $path;
	}
	public function trimPathSlashes($path){
		$path = $this->removePathFirstSlash($path);
		$path = $this->removePathLastSlash($path);
		return $path;
	}
	public function isPageAvailable($path){
		$path = $this->trimPathSlashes($path);
		if($this->isTemplateFile($path) || $this->isTemplateFolder($path)){
			return YES;
		}
		return NO;
	}
	public function isTemplateFile($path){
		$path = $this->trimPathSlashes($path);
		if(file_exists(TEMPLATE_PATH."/".$path.".tpl")){
			return YES;
		}
		return NO;
	}
	public function isTemplateFolder($path){
		$path = $this->removePathFirstSlash($path);
		if(file_exists(TEMPLATE_PATH."/".$path) && !is_file(TEMPLATE_PATH."/".$path)){
			return YES;
		}
		return NO;
	}
	public function pathToTemplateFile($path){
		$path = $this->trimPathSlashes($path);
		if($this->isTemplateFile($path)){
			return $path.".tpl";
		}
		if($this->isTemplateFolder($path)){
			if($path == ""){
				return "index.tpl";
			}
			return $path."/index.tpl";
		}
		return TEMPLATE_PATH_PAGE_NOT_FOUND;
	}
	public function displayPage($path,$vars = array()){
		$path = $this->trimPathSlashes($path);
		foreach($vars as $key => $val){
			$this->template->assign($key, $val);
		}
		
		if($this->isDynamic($path)){
			
			$response = $GLOBALS[API]->doRequest("/".$path);
			
			$this->template->assign("response",$response);
		}
		
		$template_path = $this->pathToTemplateFile($path);
		if(TEMPLATE_PATH_PAGE_NOT_FOUND == $template_path){
			$this->displayPageNotFound();
			return NO;
		}else{
			$this->template->display($template_path);
			return YES;
		}
	}
	public function displayPageBadAction($vars){
		header(RESPONSE_CODE_BAD_REQUEST);
		foreach($vars as $key => $val){
			$this->template->assign($key, $val);
		}
		$this->template->display(TEMPLATE_PATH_BAD_ACTION_REQUEST);
		return YES;
	}
	public function displayPageNotFound(){
		header(RESPONSE_CODE_NOT_FOUND);
		$this->template->display(TEMPLATE_PATH_PAGE_NOT_FOUND);
		return YES;
	}
	public function displayBadRequest(){
		header(RESPONSE_CODE_BAD_REQUEST);
		$this->template->display(TEMPLATE_PATH_BAD_REQUEST);
		return YES;
	}
}
