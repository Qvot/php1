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

$product = getProduct( $id );

$name			= $_POST['name'] ?? $product['name'];
$description	= $_POST['description'] ?? $product['description'];
$price			= $_POST['price'] ?? $product['price'];
$image			= $_FILES['image'] || [];


if ($name !== $product['name'] || $description !== $product['description'] || $price !== $product['price'] ) {
	if ($name && $description && $price && $image ) {
		if (updateProduct($id, $name, $description, $price, $image)) {
			$message = 'Продукт изменен';
		} else {
			$message = 'Произошла ошибка';
		}
	} elseif ($name || $description || $price ) {
		$message = "Форма не заполнена";
	}
}


echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Редактировать продукт',
	'h1'		=> 'Редактировать продукт',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminUpdateProduct.tpl', [
		'name'			=> $name,
		'description'	=> $description,
		'price'			=> $price
	])
], 'render_callback');