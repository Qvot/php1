<?php

require_once __DIR__ . '/../../config/config.php';

if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

#echo "<pre>";
#var_dump($_POST);
#echo "</pre>";

if (isset($_POST['delete'])) {
	if (deleteProduct($id)) {
		$message = 'Продукт удален';
		exit();
	} else {
		$message = 'Произошла ошибка';
	}
}

$product = getProduct( $id );





echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Удалить продукт',
	'h1'		=> 'Удалить продукт',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminDeleteProduct.tpl', [
		'id'	=> $id,
		'name'	=> $product['name'],
	])
], 'render_callback');


