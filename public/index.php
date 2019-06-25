<?php

require_once __DIR__ . '/../config/config.php';

echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";

$uploaddir = WWW_DIR . '/img/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

// if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//     echo "Файл корректен и был успешно загружен.\n";
// } else {
//     echo "Возможная атака с помощью файловой загрузки!\n";
// }
?>

<form enctype="multipart/form-data" method="POST">
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>


<form method="POST">
	<input type="number" name="a">
	<input type="number" name="b">
	<select name="oper">
		<option>+</option>
		<option>-</option>
		<option>*</option>
		<option>/</option>
	</select>

	<input type="submit" name="button">
</form>