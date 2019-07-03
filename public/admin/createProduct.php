<?php

require_once '../../config/config.php';

if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

#echo '<pre>';
#var_dump($_POST);
#var_dump($_FILES);
#echo '</pre>';

//?? - заменяет isset($a) ? $a : '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? false;
$file = $_FILES['image'] ?? [];


if($name || $description || $price !== false) {
	if($name && $description && $price !== false) {
		//пытаемся вставить новую новость
		$result = insertProduct($name, $description, $price, $file);

		//если новость добавлено обнуляем $title и $content
		if($result) {
			$message = 'Товар добавлен<br>';
			$name = '';
			$description = '';
			$price = 0;
		} else {
			$message = 'Произошла ошибка<br>';
		}
	} else {
		$message = 'Недостаточно данных<br>';
	}

}

echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Создать продукт',
	'h1'		=> 'Создать продукт',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminCreateProduct.tpl', [
		'name'			=> $name,
		'description'	=> $description,
		'price'			=> $price
	])
], 'render_callback');
