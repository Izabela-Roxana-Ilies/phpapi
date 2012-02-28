<!DOCTYPE html>
<html>
	<head>
		<title>{$page.title}</title>
	{foreach from=$metas key=name item=content}
		<meta name="{$name}" content="{$content}" />
	{/foreach}
		<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="/static/js/ut.js"></script>
		<script language="JavaScript" type="text/javascript" src="/static/js/init.js"></script>
	</head>