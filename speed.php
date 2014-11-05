<?php
$logdir = $_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads/mhm-wp-speedtest/' . date('Ymd');
mkdir($logdir, 0755, true);
file_put_contents(
	$logdir.'/speed.' .date('H'). '.log',
	$_SERVER['REMOTE_ADDR'].chr(9).$_SERVER["HTTP_USER_AGENT"].chr(9).$_SERVER["HTTP_ACCEPT_LANGUAGE"].chr(9).strval($_GET['bps']).PHP_EOL,
	FILE_APPEND
);