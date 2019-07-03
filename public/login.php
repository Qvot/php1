<?php

require_once '../config/config.php';
//
#echo '<pre>';
#var_dump($_SESSION);
#echo '</pre>';


//Вариант без AJAX

if( checkLogin( ) ){
	header( 'Location: /' );
	exit;
}

$message = $_GET['message'] ?? '';



echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Авторизация',
	'h1'		=> 'Авторизация',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'login.tpl')
], 'render_callback');