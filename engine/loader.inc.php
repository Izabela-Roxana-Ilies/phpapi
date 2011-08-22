<?php
require_once("ClassLoader.php");
require_once(FB_SDK_PATH."facebook.php");
$autoloader = new ClassAutoloader(array(API_PATH,API_MODULES_PATH,CLASSES_PATH));
$facebook = new Facebook(array("appId"=> FB_APP_ID,"secret"=> FB_APP_SECRET));
$DBLink = new DBLink(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$Content = new Content();
?>