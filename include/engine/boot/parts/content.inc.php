<?php
	header("Content-type: ".CONTENT_TYPE_HTML);
	$GLOBALS[CONTENT]->displayPage($lUrl["path"],array(
		"page"=>array(
			"title"=>"phpAPI project, efortless web-2.0 system building"
		),
		"metas"=>array(
			"author"=>"PhpApi.org, RobertDoroftei",
			"description"=>"phpAPI project, efortless web-2.0 system building",
			"keywords"=>"phpAPI project, efortless web-2.0 system building"
		),	
	));