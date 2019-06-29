<?php

require_once '../config/config.php';
//
#echo '<pre>';
#var_dump($_SESSION);
#echo '</pre>';

checkLogin();

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> 'Профиль',
	'content'	=> render(TEMPLATES_DIR . 'profile.tpl',[
		'login'	=> $_SESSION['login']['login'],
		'name'	=> $_SESSION['login']['name']
	])
]);

