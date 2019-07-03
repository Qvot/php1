<form action="/api.php" method="POST">
	<p>Логин: <input class="login" type="text" name="postData[login]"/></p>
	<p>Пароль: <input class="password" type="password" name="postData[password]"/></p>
	<input type="hidden" name="apiMethod" value="login"/>
	<input type="hidden" name="location" value="/profile.php"/>
	<input type="submit" onclick="login(); return false" value="Войти">
</form>