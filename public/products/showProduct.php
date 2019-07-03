<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

$message = $_GET['message'] ?? '';




echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> "Товар $id",
	'message'	=> $message,
	'content'	=> showProduct($id)
], 'render_callback');
