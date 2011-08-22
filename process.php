<?php
/*
 * Copyright 2011 PHP API
 * 
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 * 
 */
require_once("config.inc.php");
require_once(ENGINE_PATH."loader.inc.php");
/*
 * Lets begin checking the request
 * 
 * First if this is an API call .. let's treat it accordingly
 */
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
/*
 * 
 * 
 * 
 */
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