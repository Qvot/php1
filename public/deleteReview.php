<?php

require_once __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if (isset($_POST['delete'])) {
	if (deleteReview($id)) {
		echo 'Комментарий удален';
		exit();
	} else {
		echo 'Произошла ошибка';
	}
}

$review = getReview($id);

$author = $_POST['author'] ?? $review['author'];
$text = $_POST['text'] ?? $review['text'];




?>

<hr>

Удалить отзыв <?= $review['id'] ?>:
<form method="POST">
	Имя: <input type="text" name="author" value="<?= $author ?>"><br>
	Комментарий: <textarea name="text"><?= $text ?></textarea><br>
	<input type="submit" name="delete" value="Да, удалить." />
</form>