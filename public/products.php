<?php

require_once __DIR__ . '/../config/config.php';

echo "<pre>";
var_dump($_POST);
echo "</pre>";


$products = getProducts(  );

echo "<div class=\"products\">";
foreach ($products as $product) {
	if( ! is_file(WWW_DIR . $product['image'])) {
		$product['image'] = 'img/no-image.jpeg';
	}
	echo "<div class=\"product\">";
	echo '<img src="/' . $product['image'] . '" alt="Картинка товара" style="max-width:100px">';
	echo "<h2>" . $product['name'] . "</h2>";
	echo "<p>Цена: " . $product['price'] . "</p>";
	echo " <a href=\"productView.php?id=" . $product['id'] . "\">Смотреть</a>";
	echo "</div>";
	echo '<hr>';
}
echo "</div>";
