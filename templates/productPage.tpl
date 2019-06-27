<div>
	<a href="updateProduct.php?id={{ID}}">Редактировать</a>
	<a href="deleteProduct.php?id={{ID}}">Удалить</a>
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
<form action="/cart.php" method="post">
	<input type="hidden" name="product_id" value="{{ID}}">
	<input type="number" name="quantity" value="1">
	<input type="submit" name="cart_add" value="Добавить в корзину">
</form>