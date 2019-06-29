<?php
function renderCart( $alert = '' ){
	#echo "<pre>";
	#var_dump($_POST);
	#var_dump($_SESSION);
	#echo "</pre>";

	$empty_cart = true;
	$itog = 0;
	#$products = getProducts();
	foreach( getProducts() as $value ){
		$products[ $value['id'] ] = $value;
	}

	if( is_array($_SESSION['cart']['items']) ){
		foreach( $_SESSION['cart']['items'] as $id => $item ){
			
			$empty_cart = false;
			if( isset($products[$id]) ){
				$poditog = $products[$id]['price'] * $item['quantity'];
				$itog += $poditog;
				$cartitems .= render(TEMPLATES_DIR . 'cartItem.tpl', [
					'id'		=> sprintf( '%-3s', $id ),
					'name'		=> utf_8_sprintf( "%-40s", $products[$id]['name'] ),
					'price'		=> sprintf( '%10s', $products[$id]['price'] ),
					'quantity'	=> sprintf( '%5s', $item['quantity'] ),
					'poditog'	=> sprintf( '%10s', sprintf('%.2f', $poditog) )
				]);
			}else{
			#	$cartitems .= 'Этого товара в продаже нет.<br>';
				$cartitems .= render(TEMPLATES_DIR . 'cartItem404.tpl',[
					'id'		=> sprintf( '%-3s', $id )
				]);
			}
			
		}
		if( ! $empty_cart ){
			$cartitems .= '| Итого: ' . sprintf( '%.2f р.', $itog );
		}
	}

	if( $empty_cart ){
		return render(TEMPLATES_DIR . 'cartEmpty.tpl');
	}
	
	return render(TEMPLATES_DIR . 'cart.tpl',[
		'alert' => $alert,
		'cartitems' => $cartitems
	]);
#	return  . '<pre>' . $cartitems . '</pre>';
}