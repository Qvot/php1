<?php

require_once '../config/config.php';



if (empty($_SESSION['login'])) {
	header('Location: /login.php');
}

$message = $_GET['message'] ?? '';


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> 'Профиль',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'profile.tpl',[
		'login'		=> $_SESSION['login']['login'],
		'name'		=> $_SESSION['login']['name'],
		'orders'	=> generateMyOrdersPage(),
	])
], 'render_callback');
