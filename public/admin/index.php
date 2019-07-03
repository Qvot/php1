<?php

require_once '../../config/config.php';


if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

$user_id = (int)$_SESSION['login']['id'];



echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Админь',
	'h1'		=> 'Админка',
	'message'	=> $message,
	'content'	=> ''
], 'render_callback');