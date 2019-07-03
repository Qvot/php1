<?php

require_once '../config/config.php';


if(empty($_SESSION['login'])) {
	header('Location: /login.php');
}

$message = $_GET['message'] ?? '';
$user_id = (int)$_SESSION['login']['id'];



echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Мой заказы',
	'h1' => 'Мой заказы',
	'message'	=> $message,
	'content' => generateMyOrdersPage()
], 'render_callback');
