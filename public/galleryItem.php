<?php

require_once __DIR__ . '/../config/config.php';

//var_dump($_GET['id']);

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if(!$id) {
	echo 'id не передан';
	exit();
}
$message = $_GET['message'] ?? '';
	
#	считать кол-во кликов по картинке наверно выходят за рамки учебной программы
#	поэтому будем считать кол-во просмотров страницы с картинкой
	$sql = 'SELECT * FROM images WHERE `id` = ' . $id;
	$image = show( $sql );

	$image['views']++;
	$sql = 'UPDATE `images` SET  `views` = ' . $image['views'] . ' WHERE `id` = ' . $id;
	execQuery( $sql );
	
#	print_r( $image );
	
	echo render(TEMPLATES_DIR . 'index.tpl', [
		'title'		=> 'Галерея',
		'h1'		=> 'Лучшие картиночки',
		'message'	=> $message,
		'content'	=> render(TEMPLATES_DIR . 'gallerySingle.tpl', [
			'src'	=> $image['url'],
			'views'	=> (string)$image['views'], #render() !is_string мне понравилось)))
			'title'	=> $image['title']
		])
	], 'render_callback');

