<?php

/**
 * Генерирует список всех юзеров или по списку id
 * @return array
 */
function getUsers( $ids = [] )
{
	$where = '';
	if( ! empty($ids) ){
		$where = "WHERE `id` IN (" . implode( ',', $ids ) . ")";
	}
	$users = getAssocResult("SELECT `id`, `name`, `login`, `role` FROM `users` $where");
	
	foreach( $users as $user ){
		$result[ $user['id'] ] = $user;
	}
	
	return $result;
}

function getUser( $id )
{
	//для безопасности превращаем id в число
	$id = (int) $id;
	
	$sql = "SELECT `id`, `name`, `login`, `role` FROM `users` WHERE `id` = $id";
	
	return show($sql);
}



/**
 * Функция удаляет юзера
 * @param int $id
 * @return bool
 */
function deleteUser($id)
{
	$id = (int) $id;

	$sql = "DELETE FROM `users` WHERE `id` = $id";

	return execQuery($sql);
}


/**
 * Редактирование юзера
 * @param int $id
 * @param string $name
 * @param string $login
 * @param integer $role
 * @param string $password
 * @return bool
 */
function updateUser($id, $name, $login, $role, $password = null)
{

	//создаем соединение с БД
	$db = createConnection();
	//Избавляемся от всех инъекций в $title и $content
	$name = escapeString($db, $name);
	$login = escapeString($db, $login);
	$role = (int) $role;
	if( $password ){
		$password = md5( $password );
	}

	//генерируем SQL добавления в БД

	$sql = $password
		? "UPDATE `users` SET `name`='$name', `login`='$login', `role`=$role, `password`='$password' WHERE `id` = $id"
		: "UPDATE `users` SET `name`='$name', `login`='$login', `role`=$role WHERE `id` = $id";

	//выполняем запрос
	return execQuery($sql, $db);
}