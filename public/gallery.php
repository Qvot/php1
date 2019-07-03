<?php

require_once __DIR__ . '/../config/config.php';


$message = $_GET['message'] ?? '';

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Geek Brains Site',
	'h1' => 'Галерея',
	'message'	=> $message,
	'content' => createGallery()
], 'render_callback');
