<?php

require_once __DIR__ . '/../config/config.php';


$message = $_GET['message'] ?? '';

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Контакты',
	'h1' => 'Контакты',
	'message'	=> $message,
	'content' => render(TEMPLATES_DIR . 'contacts.tpl')
], 'render_callback');
