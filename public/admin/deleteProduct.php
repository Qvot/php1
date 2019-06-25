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

if (isset($_POST['delete'])) {
	if (deleteProduct($id)) {
		echo 'Продукт удален';
		exit();
	} else {
		echo 'Произошла ошибка';
	}
}

$product = getProduct( $id, true );





?>

<hr>

Удалить продукт #<?= $product['id'] ?>:
<form method="POST">
	Название: <input type="text" name="author" value="<?= $product['name'] ?>"><br>
	<input type="submit" name="delete" value="Да, удалить." />
</form>