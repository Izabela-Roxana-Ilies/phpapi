<?php
	header("Content-type: ".CONTENT_TYPE_HTML);
	$GLOBALS[CONTENT]->displayPage($lUrl["path"],array(
		"page"=>array(
			"title"=>"Caut Partener"
		),
		"metas"=>array(
			"author"=>"CautPartener.ro, RobertD.",
			"description"=>"Ce faci azi? Ai cu cine?",
			"keywords"=>"Plimbare sub clar de luna in muntii Bucegi, cine vine?"
		),
		"fb"=>$GLOBALS[TEMPLATE_SETTINGS],
		"activitytags"=>$activitiytags	
	));