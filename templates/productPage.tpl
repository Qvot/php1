<div>
	<form action="/api.php" method="post">
		<input type="hidden" name="postData[id]" value="{{ID}}">
		<input type="hidden" name="location" value="/products/cart.php">
		<button name="apiMethod" value="addToCart" o1nclick="addToCart({{ID}}); return false;">Купить</button>
	</form>
</div>
<hr>
<div>
	Название: {{NAME}}
</div>
<div>
	Описание: {{DESCRIPTION}}
</div>
<div>
	Цена: {{PRICE}}
</div>
<div>
	Изображение:
	<img src="/{{IMAGE}}" alt="image-{{ID}}" style="max-width: 300px; max-height: 300px"/>
</div>
