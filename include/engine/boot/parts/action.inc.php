<?php
$action_request_path = str_replace("/".DYNAMIC_ACTION_INIT_STRING, "", $lUrl["path"]);
	$GLOBALS[ACTION]->doRequest($action_request_path);
	
