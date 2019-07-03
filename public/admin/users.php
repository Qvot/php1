<?php

require_once __DIR__ . '/../../config/config.php';

if( ! checkLogin( true ) ){
	header( 'Location: /login.php' );
	exit;
}

#echo "<pre>";
#var_dump($_POST);
#echo "</pre>";


$users = getUsers();
$usersList = '';
foreach ($users as $user) {
	$usersList .= render(TEMPLATES_DIR . 'adminUsersListItem.tpl', [
		'id'	=> $user['id'],
		'name'	=> $user['name'],
		'login'	=> $user['login'],
		'role'	=> $user['role'],
	]);
}


echo render(TEMPLATES_DIR . 'admin.tpl', [
	'title'		=> 'Админь',
	'h1'		=> 'Юзеры',
	'message'	=> $message,
	'content'	=> render(TEMPLATES_DIR . 'adminUsersList.tpl', [
		'list'	=> $usersList
	])
], 'render_callback');
