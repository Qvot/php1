<?php

require_once __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}




	$product = getProduct( $id );

	if( ! is_file(WWW_DIR . $product['image'])) {
		$product['image'] = 'img/no-image.jpeg';
	}
	echo "<div class=\"product\">";
	echo '<img src="/' . $product['image'] . '" alt="Картинка товара" style="float:right; max-width:500px">';
	echo "<h2>" . $product['name'] . "</h2>";
	echo "<p>" . $product['description'] . "</p>";
	echo "<p>Цена: " . $product['price'] . "</p>";
	echo "</div>";
	echo '<hr style="clear:both;">';


