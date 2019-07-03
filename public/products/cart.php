<?php

require_once __DIR__ . '/../../config/config.php';


$message = $_GET['message'] ?? '';


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> 'Корзина',
	'message'	=> $message,
	'content'	=> renderProductsCart($_COOKIE['cart'] ?? []),
	'button'	=> empty($_SESSION['login'])
		? '<a href="/login.php">Войти</a>'
		: '<a href="/products/createOrder.php" class="btn">Оформить заказ</a>'
], 'render_callback');
