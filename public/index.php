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


	

#	1. Создать форму-калькулятор операциями: сложение, вычитание, умножение, деление.
#	Не забыть обработать деление на ноль! Выбор операции можно осуществлять
#	с помощью тега <select>.
#	2. Создать калькулятор, который будет определять тип выбранной пользователем
#	операции, ориентируясь на нажатую кнопку.

#	Получилось так что один код является решением для двух задач
#	По дополнительным кнопкам
#	Submit передает значение только если на него нажали
#	Соответственно $_POST['oper'] будет переопределяться
#	Поэому кнопки расположены после select
	$result = null;
	if( isset($_POST['oper']) ){
		$a = (int) $_POST['a'];
		$b = (int) $_POST['b'];
		if( ! in_array($_POST['oper'], ['+','-','*','/']) ){
			$result = 'Не передана правильная математическая операция[+,-,*,/].';
		}else{
			$result =
					$a . ' ' . $_POST['oper'] . ' ' . $b
				.	' = ' . math_operation( $a, $b, $_POST['oper'] )
			;
		}
	}
	

?>

<form enctype="multipart/form-data" method="POST">
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

<?=$result?>
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

	<input type="submit" name="oper" value="+">
	<input type="submit" name="oper" value="-">
	<input type="submit" name="oper" value="*">
	<input type="submit" name="oper" value="/">
</form>
