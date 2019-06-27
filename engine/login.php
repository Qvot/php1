<?php

#	Проверка авторизации юзера
#	ничего не возвращает
#	в случае не верных данных редиректит на форму авторизации
function checkLogin(){
	if( empty($_SESSION['login']) ){
		header( 'Location: login.php' );
		exit;
	}
	
	if( 	isset($_SESSION['login']['id'])
		&& isset($_SESSION['login']['login'])
		&& isset($_SESSION['login']['password'])
	){
		$sql = 'SELECT * FROM `users` WHERE `id` = ' . (int)$_SESSION['login']['id'];
		$user = show($sql);
		if( $user['login'] != $_SESSION['login']['login']
			|| $user['password'] != $_SESSION['login']['password']
		){
			header( 'Location: login.php' );
			exit;
		}
	}
	
}