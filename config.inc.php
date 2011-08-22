<?php
define("ROOT_PATH","THE_PATH_TO_YOUR_ROOT_DIRECTORY"); // please change this
define("ENGINE_PATH",ROOT_PATH."engine/");
define("CLASSES_PATH",ENGINE_PATH."classes/");
define("API_PATH",ENGINE_PATH."theapi/");
define("API_MODULES_PATH",API_PATH."modules/");
define("FB_APP_ID","YOUR_FACEBOOK_APP_ID"); // please change this
define("FB_APP_SECRET","YOUR_FACEBOOK_SECRET_CODE"); // please change this
define("FB_SDK_PATH",ENGINE_PATH."fbsdk/");
define("SMARTY_SDK_PATH",ENGINE_PATH."smarty/Smarty.class.php");
define("TEMPLATE_PATH",ROOT_PATH."template/");
/*
 * Change the followings to suite your DB connections
 */
define("DB_HOST","localhost");
define("DB_USER","your db username");
define("DB_NAME","your db name");
define("DB_PASS","your db password");
define("APP_URL","http://www.phpapi.org/"); // PLEASE CHANGE THIS to your website URL (where the system is active)
define("API_INIT_STRING","API")
?>