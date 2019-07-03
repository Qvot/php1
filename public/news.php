<?php

require_once __DIR__ . '/../config/config.php';


$message = $_GET['message'] ?? '';
$news = getNews();
$newsContent = renderNews($news);


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Новости',
	'h1' => 'Горячие новости',
	'message'	=> $message,
	'content' => $newsContent
], 'render_callback');
