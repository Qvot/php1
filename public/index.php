<?php

require_once '../config/config.php';


#echo "<pre>";
#var_dump($_COOKIE);
#var_dump(array_keys($_COOKIE['cart']));
#echo "</pre>";


$message = $_GET['message'] ?? '';


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Новости',
	'h1'		=> 'Горячие новости',
	'message'	=> $message,
	'content'	=> '',
	
], 'render_callback');
