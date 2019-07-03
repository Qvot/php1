<?php

require_once __DIR__ . '/../../config/config.php';


$message = $_GET['message'] ?? '';

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Geek Brains Site',
	'h1' => 'Продукты',
	'message'	=> $message,
	'content' => renderProductList()
], 'render_callback');
