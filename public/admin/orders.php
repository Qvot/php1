<?php

require_once '../../config/config.php';



if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

$user_id = (int)$_SESSION['login']['id'];



echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Заказы',
	'h1'		=> 'Заказы',
	'message'	=> $message,
	'content'	=> generateOrdersPage()
], 'render_callback');
