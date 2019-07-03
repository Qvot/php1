<?php

/**
 * Функция получени всех продуктов
 * @return array
 */
function getProducts()
{
	$sql = "SELECT * FROM `products`";

	return getAssocResult($sql);
}

/**
 * Функция получает один продукт по его id
 * @param int $id
 * @return array|null
 */
function getProduct($id)
{
	//для безопасности превращаем id в число
	$id = (int) $id;

	$sql = "SELECT * FROM `products` WHERE `id` = $id";

	return show($sql);
}

/**
 * Функция генерации списка продуктов
 * @return string
 */
function renderProductList()
{
	//инициализируем результирующую строку
	$result = '';
	//получаем все изображения
	$products = getProducts();

	//для каждого изображения
	foreach ($products as $product) {
		//если изображение существует
		if(empty($product['image'])) {
			$product['image'] = 'img/no-image.jpeg';
		}
		$result .= render(TEMPLATES_DIR . 'productsListItem.tpl', $product);
	}
	return render(TEMPLATES_DIR . 'productsList.tpl', ['list' => $result]);
}

/**
 * Генерирует страницу корзины
 * @param array $cart
 * @return string
 */
function renderProductsCart($cart)
{
	if(empty($cart)) {
		return 'корзина пуста';
	}

	//получаем айдишники товаров
	$ids = array_keys($cart);

	//генерируем запрос
	$sql = "SELECT * FROM `products` WHERE `id` IN (" . implode(', ', $ids) . ")";
	$products = getAssocResult($sql);


	//инициализируем строку контента и сумму корзины
	$content = '';
	$cartSum = 0;
	foreach ($products as $product) {
		$count = $cart[$product['id']];
		$price = $product['price'];
		$productSum = $count * $price;
		//генерируем элемент корзины
		$content .= render(TEMPLATES_DIR . 'cartListItem.tpl', [
			'name' => $product['name'],
			'id' => $product['id'],
			'count' => $count,
			'price' => $price,
			'sum' => $productSum
		]);

		$cartSum += $productSum;
	}

	return render(TEMPLATES_DIR . 'cartList.tpl', [
		'content' => $content,
		'sum' => $cartSum
	]);
}

/**
 * @param int $id
 * @return string
 */
function showProduct($id)
{
	//для безопасности превращаем id в число
	//получаем товар
	$product = getProduct((int) $id);

	if(!$product) {
		return '404';
	}

	//возвращаем render шаблона
	return render(TEMPLATES_DIR . 'productPage.tpl', $product);
}

/**
 * Создание нового продукта
 * @param string $name
 * @param string $description
 * @param float $price
 * @param array $file
 * @return bool
 */
function insertProduct($name, $description, $price, $file)
{
	if($file) {
		$fileName = loadFile('image', 'img/');
	}


	//создаем соединение с БД
	$db = createConnection();
	//Избавляемся от всех инъекций в $title и $content
	$name = escapeString($db, $name);
	$description = escapeString($db, $description);
	$price = (float) $price;

	//генерируем SQL добавления в БД

	$sql = $file
		? "INSERT INTO `products`(`name`, `description`, `price`, `image`) VALUES ('$name', '$description', $price, '$fileName')"
		: "INSERT INTO `products`(`name`, `description`, `price`) VALUES ('$name', '$description', $price)";

	//выполняем запрос
	return execQuery($sql, $db);
}
/**
 * Редактирование продукта
 * @param int $id
 * @param string $name
 * @param string $description
 * @param float $price
 * @param array $file
 * @return bool
 */
function updateProduct($id, $name, $description, $price, $file)
{
	$uploadFile = $file && !$file['error'];
	if($uploadFile) {
		$fileName = loadFile('image', 'img/');
	}


	//создаем соединение с БД
	$db = createConnection();
	//Избавляемся от всех инъекций в $title и $content
	$name = escapeString($db, $name);
	$description = escapeString($db, $description);
	$price = (float) $price;

	//генерируем SQL добавления в БД

	$sql = $uploadFile
		? "UPDATE `products` SET `name`='$name', `description`='$description', `price`=$price, `image`='$fileName' WHERE `id` = $id"
		: "UPDATE `products` SET `name`='$name', `description`='$description', `price`=$price WHERE `id` = $id";

	//выполняем запрос
	return execQuery($sql, $db);
}

function setStatusOrder( $id, $status ){
	$id = (int) $id;

	$sql = "UPDATE `orders` SET `status`='$status'  WHERE `id` = $id";
	
	//выполняем запрос
	return execQuery($sql, $db);
}

/**
 * Функция удаляет продукт
 * @param int $id
 * @return bool
 */
function deleteProduct($id)
{
	$id = (int) $id;

	$sql = "DELETE FROM `products` WHERE `id` = $id";

	return execQuery($sql);
}

/**
 * Генерирует страницу всех заказов
 * @return string
 */
function generateOrdersPage()
{
	//получаем id пользователя и и получаем все заказы пользователя
	$orders = getAssocResult("SELECT * FROM `orders` ORDER BY dateCreate DESC");
	
	foreach( $orders as $order ){
		$usersId[] = $order['userId'];
	}
	
	$users = getUsers( $usersId );
	
	$result = '';
	foreach ($orders as $order) {
		$orderId = $order['id'];

		//получаем продукты, которые есть в заказе
		$products = getAssocResult("
			SELECT * FROM `orderProducts` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId
		");

		$content = '';
		$orderSum = 0;
		//генерируем элементы таблицы товаров в заказе
		foreach ($products as $product) {
			$count = $product['amount'];
			$price = $product['price'];
			$productSum = $count * $price;
			$content .= render(TEMPLATES_DIR . 'orderTableRow.tpl', [
				'name' => $product['name'],
				'id' => $product['id'],
				'count' => $count,
				'price' => $price,
				'sum' => $productSum
			]);
			$orderSum += $productSum;
		}

		$statuses = [
			1 => 'Заказ не обработан',
			2 => 'Заказ отменен',
			3 => 'Заказ оплачен',
			4 => 'Заказ доставлен',
		];

		//генерируем полную таблицу заказа
		$result .= render(TEMPLATES_DIR . 'adminOrderTable.tpl', [
			'id'			=> $orderId,
			'dateCreate'	=> $order['dateCreate'],
			'content'		=> $content,
			'sum'			=> $orderSum,
			'status'		=> $statuses[$order['status']],
			'user_id'		=> $order['userId'],
			'user'			=> $users[$order['userId']]['name'],
			'address'		=> $order['address']
		]);
	}
	return $result;
}
/**
 * Генерирует страницу моих заказов
 * @return string
 */
function generateMyOrdersPage()
{
	//получаем id пользователя и и получаем все заказы пользователя
	$userId = $_SESSION['login']['id'];
	$orders = getAssocResult("SELECT * FROM `orders` WHERE `userId` = $userId ORDER BY dateCreate DESC");

	$result = '';
	foreach ($orders as $order) {
		$orderId = $order['id'];

		//получаем продукты, которые есть в заказе
		$products = getAssocResult("
			SELECT * FROM `orderProducts` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId
		");

		$content = '';
		$orderSum = 0;
		//генерируем элементы таблицы товаров в заказе
		foreach ($products as $product) {
			$count = $product['amount'];
			$price = $product['price'];
			$productSum = $count * $price;
			$content .= render(TEMPLATES_DIR . 'orderTableRow.tpl', [
				'name' => $product['name'],
				'id' => $product['id'],
				'count' => $count,
				'price' => $price,
				'sum' => $productSum
			]);
			$orderSum += $productSum;
		}

		$statuses = [
			1 => 'Заказ не обработан',
			2 => 'Заказ отменен',
			3 => 'Заказ оплачен',
			4 => 'Заказ доставлен',
		];

		//генерируем полную таблицу заказа
		$result .= render(TEMPLATES_DIR . 'orderTable.tpl', [
			'id' => $orderId,
			'dateCreate'	=> $order['dateCreate'],
			'content' => $content,
			'sum' => $orderSum,
			'status' => $statuses[$order['status']]
		]);
	}
	return $result;
}
