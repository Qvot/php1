<!doctype>
<html>
<head>
	<title>{{TITLE}}</title>
	<link rel="stylesheet" href="/css/style.css">
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/main.js"></script>
</head>
<body>
	<header>
		<ul>
			<li><a href="/">Главная</a></li>
			<li><a href="/products/">Продукты</a></li>
			<li><a href="/gallery.php">Галлерея</a></li>
			<li><a href="/news.php">Новости</a></li>
			<li><a href="/contacts.php">Контакты</a></li>
			<li><a href="/products/cart.php">Корзина</a></li>
			{{ADMIN}}
			{{PROFILE}}
			{{LOGIN}}
		</ul>
	</header>
	<h1>{{H1}}</h1>
	<hr>
	<div class="message">{{MESSAGE}}</div>
	<div>{{CONTENT}}</div>
</body>
</html>
