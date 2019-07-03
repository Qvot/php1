<tr data-id="{{ID}}">
	<td>{{NAME}}</td>
	<td>{{PRICE}}</td>
	<td>{{COUNT}}</td>
	<td>{{SUM}}</td>
	<td>
		<form action="/api.php" method="post">
			<input type="hidden" name="postData[id]" value="{{ID}}">
			<input type="hidden" name="location" value="/products/cart.php">
			<button name="apiMethod" value="removeFromCart" onclick="removeFromCart({{ID}}); return false;">Удалить</button>
		</form>
	</td>
</tr>
