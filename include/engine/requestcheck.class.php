<?php
class RequestCheck{
	function __construct(){
		
	}
	public function is($url){
		$url_by_path = explode("/", $url);
		switch($url_by_path[1]){
			case API_INIT_STRING:
				return IS_API;
			break;
			case DYNAMIC_JS_INIT_STRING:
				return IS_JS;
			break;
			case DYNAMIC_ACTION_INIT_STRING:
				return IS_ACTION;
			break;
			default:
				return IS_CONTENT;
			break;
		}
	}
}
