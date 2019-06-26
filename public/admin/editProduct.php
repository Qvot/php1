<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$product = getProduct( $id, true );

$product['isActive'] = (bool)$product['isActive'];
$name			= $_POST['name'] ?? $product['name'];
$description	= $_POST['description'] ?? $product['description'];
$price			= $_POST['price'] ?? $product['price'];
$image			= $_POST['image'] ?? $product['image'];
#$isActive		= $_POST['isActive'] ? 1 : 0;
$isActive		= (bool)$_POST['isActive'] ?? (bool)$product['isActive'];


if ($name !== $product['name'] || $description !== $product['description'] || $price !== $product['price'] || $isActive !== $product['isActive']) {
	if ($name && $description && $price && $image/* && $isActive*/) {
		if (updateProduct($id, $name, $description, $price, $image, $isActive)) {
			echo 'Продукт изменен';
		} else {
			echo 'Произошла ошибка';
		}
	} elseif ($name || $description || $price || $image || $isActive ) {
		echo "Форма не заполнена";
	}
}

?>

<hr>

Отредактировать продукт #<?= $product['id'] ?>:

<form method="POST">
	Имя: <input type="text" name="name" value="<?= $name ?>"><br>
	Описание: <textarea name="description"><?= $description ?></textarea><br>
	Цена: <input type="text" name="price" value="<?= $price ?>"><br>
	Изображение: <input type="text" name="image" value="<?= $image ?>"><br>
	Активность: <input type="checkbox" name="isActive" value="1"<?=($isActive?' checked':'')?>><br>
	<input type="submit" name="submit" />
</form>