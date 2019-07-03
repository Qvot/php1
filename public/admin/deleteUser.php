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

if (isset($_POST['delete'])) {
	if( $_SESSION['login']['id'] == $id ){
		$message = 'Себя удалить нельзя';
	}elseif (deleteUser($id) ) {
		$message = 'Юзер удален';
		exit();
	} else {
		$message = 'Произошла ошибка';
	}
}

$user = getUser( $id );





echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Удалить юзера',
	'h1'		=> 'Удалить юзера',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminDeleteUser.tpl', [
		'id'	=> $id,
		'name'	=> $user['name'],
		'login'	=> $user['login'],
		'role'	=> $user['role'],
	])
], 'render_callback');


