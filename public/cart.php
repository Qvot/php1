<?php

require_once '../config/config.php';

	if( isset($_POST['cart_add']) ){
		
		$product_id = (int)$_POST['product_id'];
		$product = getProduct( $product_id );
		if( $product ){
			if( $_POST['quantity'] < 1 ){
				$_POST['quantity'] = 1;
			}
			$_SESSION['cart']['items'][ $product_id ]['quantity'] += (int)$_POST['quantity'];
		}
	#	$alert = 'Товар добавлен в корзину<br>';
		header( 'Location: ?alert=itemAdd' );
		exit;
	}

	if( isset($_GET['delete']) ){
		unset( $_SESSION['cart']['items'][ $_GET['delete'] ] );
	#	$alert = 'Товар удален из корзины<br>';
		header( 'Location: ?alert=itemDelete' );
		exit;
	}
	
	if( isset($_GET['alert']) ){
		switch( $_GET['alert'] ):
			case 'itemAdd':		$alert = 'Товар добавлен в корзину'; break;
			case 'itemDelete':	$alert = 'Товар удален из корзины'; break;
		endswitch;
	}



echo render(TEMPLATES_DIR . 'index.tpl', [
	'title'		=> 'Geek Brains Site',
	'h1'		=> 'Корзина',
	'content'	=> renderCart( $alert )
]);

