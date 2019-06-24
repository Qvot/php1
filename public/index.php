<?php

require_once __DIR__ . '/../config/config.php';



$result = execQuery("UPDATE `users` SET `role123` = 0");
var_dump($result);
die;

$news = getNews();

$content = renderNews($news);



echo render(TEMPLATES_DIR . '/index.tpl', [
	'title' => 'Новости',
	'h1' => 'Горячие Новости',
	'content' => $content
]);