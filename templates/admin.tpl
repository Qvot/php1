<!doctype>
<html>
<head>
	<title>{{TITLE}}</title>
	<link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/admin.js"></script>
</head>
<body>
	<header>
		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="/admin/products.php">Продукты</a></li>
			<li><a href="/admin/orders.php">Заказы</a></li>
			<li><a href="/admin/users.php">Юзеры</a></li>
			{{LOGIN}}
		</ul>
	</header>
	<h1>{{H1}}</h1>
	<hr>
	<div class="message">{{MESSAGE}}</div>
	<div>{{CONTENT}}</div>
</body>
</html>
