<?php
ini_set('session.cookie_domain',".phpapi.org"); //change it to your domain
define("ROOT_PATH","/home/phpapi/public_html/"); //change it to your ROOT PATH
define("INCLUDE_PATH",ROOT_PATH."include/");
define("ENGINE_PATH",INCLUDE_PATH."engine/");
define("TEMPLATE_PATH",ROOT_PATH."visual/");
define("BOOT_PATH",ENGINE_PATH."boot/");
define("BOOT_PARTS",BOOT_PATH."parts/");


define("nil",null);
define("YES",true);
define("NO",false);

define("PUBLIC_REQUEST",1);
define("PRIVATE_REQUEST",0);

define ("API_PATH",ENGINE_PATH."api/");
define ("ACTION_PATH",ENGINE_PATH."action/");
define ("API_INIT_STRING","api");
define ("DYNAMIC_JS_INIT_STRING","js");
define ("DYNAMIC_ACTION_INIT_STRING","action");
define ("API_SECRETS","API_SECRETS");

define ("TEMPLATE_PATH_PAGE_NOT_FOUND","error/pages/404.tpl");
define ("TEMPLATE_PATH_BAD_REQUEST","error/pages/400.tpl");
define ("TEMPLATE_PATH_BAD_ACTION_REQUEST","error/pages/badactionrequest.tpl");


define ("CONTENT_TYPE_JS","application/javascript");
define ("CONTENT_TYPE_JSON", "application/json");
define ("CONTENT_TYPE_HTML", "text/html");


define ("DEFAULT_JS_CALLBACK","ResponseCallback");

define ("IS_API",1);
define ("IS_JS",2);
define ("IS_CONTENT",3);
define ("IS_ACTION",4);



define("SYSTEM_URL_BEGIN","http://www.phpapi.org");

define("REQUEST","_REQUEST_PARAMS");

$GLOBALS[API_SECRETS] = array(
	"9S8d9sSd8sd9SDDS8ds9dfs" => YES
);


define("nil",null);

define("DB","_DB");
define("SESSION","__SESSION");
define("UTIL","_UTILITIES");
define("CHECK_REQUEST", "_CHECK_REQUEST");
define("API","_API");
define("ACTION","_ACTION");
define("CONTENT","_CONTENT");

define("TEMPLATE_SETTINGS","_TEMPLATE_SETTINGS_VAR");

define("DB_HOST","localhost"); //probably will remain the same
define("DB_USER","phpapi_system"); // change it to db user
define("DB_PASS","somepassword"); // change it to db pass
define("DB_NAME","phpapi_system"); // change it for your db name

define("RESPONSE_CODE_BAD_REQUEST","HTTP/1.1 400 Bad Request");
define("RESPONSE_CODE_NOT_FOUND", "HTTP/1.1 404 Not Found");
define("RESPONSE_CODE_OK", "HTTP/1.1 200 OK");
define("RESPONSE_CODE_REDIRECT_301", "HTTP/1.1 301 Moved Permanently");
define("RESPONSE_CODE_REDIRECT_307","HTTP/1.1 307 Temporary Redirect");
define("RESPONSE_CODE_METHOD_NOT_ALLOWED","HTTP/1.1 405 Method Not Allowed");


require_once(ENGINE_PATH."smarty/Smarty.class.php");

require_once(ENGINE_PATH."requestcheck.class.php");
require_once(ENGINE_PATH."utilities.class.php");
require_once(ENGINE_PATH."session.class.php");
require_once(ENGINE_PATH."mysql.class.php");
require_once(ENGINE_PATH."api.class.php");
require_once(ENGINE_PATH."content.class.php");
require_once(ENGINE_PATH."action.class.php");





switch(Api::ACCEPTS){
	case "POST":
		$GLOBALS[REQUEST] = $_POST;
	break;
	case "GET":
		$GLOBALS[REQUEST] = $_GET;
	break;
	default:
		$GLOBALS[REQUEST] = $_REQUEST;
	break;
}