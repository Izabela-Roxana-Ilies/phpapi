<?php
require_once("config.inc.php");

$DB = new MysqlConnector(DB_HOST,DB_USER,DB_PASS,DB_NAME);


$GLOBALS[DB] = $DB;
$GLOBALS[SESSION] = new Session();
$GLOBALS[UTIL] = new Utilities();
$GLOBALS[ACTION] = new Action();
$GLOBALS[API] = new Api(); 
$GLOBALS[CONTENT] = new Content();


$GLOBALS[TEMPLATE_SETTINGS] = array(

);


foreach($GLOBALS[TEMPLATE_SETTINGS] as $key=>$val){
	$GLOBALS[CONTENT]->template->assign($key,$val);
}
$response = array();

$lUrl = parse_url(SYSTEM_URL_BEGIN.$_SERVER["REQUEST_URI"]);
if($lUrl["path"][strlen($lUrl["path"])-1] == "/"){
	$lUrl["path"] = substr($lUrl["path"],0,strlen($lUrl["path"])-1);
}
$kindOfRequest = RequestCheck::is($lUrl["path"]);
switch($kindOfRequest){
	case IS_API:
		include(BOOT_PARTS."api.inc.php");
	break;
	case IS_JS:
		include(BOOT_PARTS."jsapi.inc.php");
	break;
	case IS_CONTENT:
		include(BOOT_PARTS."content.inc.php");
	break;
	case IS_ACTION:
		
		include(BOOT_PARTS."action.inc.php");
	break;
	default:
		header(RESPONSE_CODE_BAD_REQUEST);
		header("Content-type: ".CONTENT_TYPE_HTML);
		$GLOBALS[CONTENT]->displayBadRequest();
	break;
}