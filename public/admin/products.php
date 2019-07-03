<?php

require_once __DIR__ . '/../../config/config.php';

#echo "<pre>";
#var_dump($_POST);
#echo "</pre>";

if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

$products = getProducts();
$productsList = '';
foreach ($products as $product) {
	if( ! is_file(WWW_DIR . $product['image'])) {
		$product['image'] = 'img/no-image.jpeg';
	}
	$productsList .= render(TEMPLATES_DIR . 'adminProductsListItem.tpl', [
		'id'			=> $product['id'],
		'name'			=> $product['image'],
		'description'	=> $product['description'],
		'price'			=> $product['price'],
		'image'			=> $product['image'],
	]);
}


echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Админь',
	'h1'		=> 'Продукты',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminProductsList.tpl', [
		'list'	=> $productsList
	])
], 'render_callback');
