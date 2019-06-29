<?php

require_once '../config/config.php';
//
#echo '<pre>';
#var_dump($_SESSION);
#echo '</pre>';


//Вариант без AJAX


//Полуаем логин пароль
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$message = '';

//Если логин и пароль переданы попытаемся авторизоваться
if ($login && $password) {
	//преобразуем пароль в хэш
	$password = md5($password);
#	echo $password;

	//получаем пользователя из базы по логин-паролю
	$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
	$user = show($sql);

	//если пользователь найден. Записываем его в сессию
	if($user) {
		$_SESSION['login'] = $user;
		header( 'Location: profile.php' );
		exit;
	} else {
		$message = 'Неверная пара логин-пароль';
	}
}


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> 'Вход',
	'content'	=> render(TEMPLATES_DIR . 'login.tpl',[
		'message'	=> $message
	])
]);


