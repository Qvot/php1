<?php


function getProducts( $isAdmin = false ) {
	$productsSql = "SELECT * FROM `products`";
	if( $isAdmin === false ){
		$productsSql .= " WHERE isActive = 1";
	}
	return getAssocResult($productsSql);
}

function getProduct( $id, $isAdmin = false )
{
	$id = (int) $id;
	$sql = "SELECT * FROM `products` WHERE `id` = $id";
	if( $isAdmin === false ){
		$sql .= " AND isActive = 1";
	}
	return show($sql);
}

function insertProduct($name, $description, $price, $image, $isActive) {
	$db = createConnection();
	$name			= escapeString($db, $name);
	$description	= escapeString($db, $description);
	$price			= escapeString($db, $price);
	$image			= escapeString($db, $image);
	$isActive		= escapeString($db, $isActive);
	$sql = "INSERT INTO `products`(`name`, `description`, `price`, `image`, `isActive`) VALUES ('$name', '$description', '$price', '$image', '$isActive')";
	return execQuery($sql, $db);
}

function updateProduct($id, $name, $description, $price, $image, $isActive) {
	$db = createConnection();
	$id = (int) $id;
	$name			= escapeString($db, $name);
	$description	= escapeString($db, $description);
	$price			= escapeString($db, $price);
	$image			= escapeString($db, $image);
	$isActive		= escapeString($db, $isActive);
	$dateChange		= date( 'Y-m-d H:i:s' );
	$sql = "UPDATE `products` SET `name`='$name', `description`='$description', `price`='$price', `image`='$image', `isActive`='$isActive', `dateChange`='$dateChange' WHERE `id` = $id";
	return execQuery($sql, $db);
}

function deleteProduct($id) {
	$db = createConnection();
	$id = (int) $id;
	$sql = "DELETE FROM `products` WHERE `id` = $id";
	return execQuery($sql, $db);

}