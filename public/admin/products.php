<?php

require_once __DIR__ . '/../../config/config.php';

echo "<pre>";
var_dump($_POST);
echo "</pre>";


$name			= $_POST['name'] ?? null;
$description	= $_POST['description'] ?? null;
$price			= $_POST['price'] ?? null;
$image			= $_POST['image'] ?? null;
$isActive		= $_POST['isActive'] ?? null;

if ($name && $description && $price) {
	if (insertProduct($name, $description, $price, $image, $isActive )) {
		echo 'Продукт добавлен';
		$name			= '';
		$description	= '';
		$price			= '';
		$image			= '';
		$isActive		= '';
	} else {
		echo 'Произошла ошибка';
	}
} elseif ($name || $description || $price) {
	echo "Форма не заполнена";
}

echo '<hr>';




$products = getProducts( true );

echo "<div class=\"products\">";
foreach ($products as $product) {
	if( ! is_file(WWW_DIR . $product['image'])) {
		$product['image'] = 'img/no-image.jpeg';
	}
	echo "<div class=\"product\">";
	echo '<img src="/' . $product['image'] . '" alt="Картинка товара" style="max-width:100px">';
	echo "<h2>" . $product['name'] . "</h2>";
	echo "<p>" . $product['description'] . "</p>";
	echo "<p>Цена: " . $product['price'] . "</p>";
	echo "<p>Активность: " . ($product['isActive']?'да':'нет') . "</p>";
	echo " <a href=\"editProduct.php?id=" . $product['id'] . "\">Редактировать</a>";
	echo " <a href=\"deleteProduct.php?id=" . $product['id'] . "\">Удалить</a>";
	echo "</div>";
	echo '<hr>';
}
echo "</div>";

?>

<hr>

Добавьте продукт:
<form method="POST">
	Имя: <input type="text" name="name" value="<?= $name ?>"><br>
	Описание: <textarea name="description"><?= $description ?></textarea><br>
	Цена: <input type="text" name="price" value="<?= $price ?>"><br>
	Изображение: <input type="text" name="image" value="<?= $image ?>"><br>
	Активность: <input type="checkbox" name="isActive" value="1"<?=($isActive?' checked':'')?>><br>
	<input type="submit" />
</form>