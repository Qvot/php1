<div class="product-item" style="display: inline-block; width: 30%">
	<img src="/{{IMAGE}}" alt="image-{{ID}}" style="max-width: 300px; max-height: 300px"/>
	<div>
		<a href="/products/showProduct.php?id={{ID}}">
			{{NAME}}
		</a>
		<form action="/api.php" method="post">
			<input type="hidden" name="postData[id]" value="{{ID}}">
			<input type="hidden" name="location" value="/products/cart.php">
			<button name="apiMethod" value="addToCart" onclick="addToCart({{ID}}); return false;">Купить</button>
		</form>
	</div>
	<div>
		{{DESCRIPTION}}
	</div>

</div>
