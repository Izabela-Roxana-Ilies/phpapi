<?php
require_once("config.inc.php");
require_once(ENGINE_PATH."loader.inc.php");
if(substr($_SERVER["REQUEST_URI"],0,5) == "/".API_INIT_STRING."/"){
	$api = new API(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH), file_get_contents("php://input"));
	$api->checkRequest();
	$theResponse = $api->getResponse();
	if($theResponse["return"]["action"] == "die"){
			if($theResponse["return"]["header"] != ""){
				header($theResponse["return"]["header"]);
			}
			die($theResponse["return"]["display"]);
	}
	if($theResponse["return"]["action"] == "redirect"){
			if($theResponse["return"]["header"] != ""){
				header($theResponse["return"]["header"]);
			}else{
				header('HTTP/1.1 301 Moved Permanently');
			}
			header("Location: ".$theResponse["return"]["location"]);
			die($theResponse["return"]["display"]);
	}
	
    header('Content-type: application/json');
    die(json_encode($api->getResponse()));
}
if(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == "/"){
	$user = null;
	
	try{
		$user = $facebook->getUser();
		$Content->AddGlobalVar("user_profile", $facebook->api("/me"));
	}catch(Exception $e){}
	$Content->AddGlobalVar("user",$user);
	
	die($Content->FetchContent("pages/index.tpl"));
	
}
header('HTTP/1.1 404 Not Found');
die($Content->FetchContent("errors/404.tpl"));
?>