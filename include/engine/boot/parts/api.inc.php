<?php
	$api_request_path = str_replace("/".API_INIT_STRING, "", $lUrl["path"]);
	if($GLOBALS[API]->isRequestAccepted($api_request_path) == NO){
		$response["is_success"] = NO;
		$response["message"] = "Request not accepted";
		$response["request"] = $api_request_path;
	}else{
		$response = $GLOBALS[API]->doRequest($api_request_path);
		$response["is_success"] = YES;
		$response["session_key"] = $GLOBALS[SESSION]->key();
	}
	header(RESPONSE_CODE_OK);
	header("Content-type: ".CONTENT_TYPE_JSON);
	die(json_encode($response));