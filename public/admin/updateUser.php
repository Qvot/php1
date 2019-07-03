<?php

require_once __DIR__ . '/../../config/config.php';

if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

$message = $_GET['message'] ?? '';

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}

#echo "<pre>";
#var_dump($_POST);
#echo "</pre>";

$user = getUser( $id );

$name		= $_POST['name'] ?? $user['name'];
$login		= $_POST['login'] ?? $user['login'];
$role		= $_POST['role'] ?? $user['role'];
$password	= $_POST['password'] ?? null;


if ($name !== $user['name'] || $login !== $user['login'] || $role !== $user['role'] || $password) {
	if ($name && $login && $role ) {
		if (updateUser($id, $name, $login, $role, $password)) {
			$message = 'Юзер изменен';
		} else {
			$message = 'Произошла ошибка';
		}
	} elseif ($name || $login || $role ) {
		$message = "Форма не заполнена";
	}
}


echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Редактировать юзера',
	'h1'		=> 'Редактировать юзера',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminUpdateUser.tpl', [
		'name'	=> $name,
		'login'	=> $login,
		'role'	=> $role
	])
], 'render_callback');