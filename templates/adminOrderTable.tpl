<div class="order order-{{ID}}">
	<h3>Заказ #{{ID}}</h3>
	<div>Создан: {{DATECREATE}}</div>
	<div>Получатель: <a href="/admin/updateUser.php?id={{USER_ID}}">{{USER}}</a></div>
	<div>Доставка: {{ADDRESS}}</div>
	<div>Статус заказ: <span class="order_status">{{STATUS}}</span>
		<form action="/api.php" method="post">
			<input type="hidden" name="postData[id]" value="{{ID}}">
			<input type="hidden" name="location" value="/admin/orders.php">
			<button name="apiMethod" value="setOrderStatusCancel" onclick="setOrderStatusCancel({{ID}}); return false;">Отменен</button>
			<button name="apiMethod" value="setOrderStatusPaid" onclick="setOrderStatusPaid({{ID}}); return false;">Оплачен</button>
			<button name="apiMethod" value="setOrderStatusDelivery" onclick="setOrderStatusDelivery({{ID}}); return false;">Доставлен</button>
		</form>
	</div>
	<table class="cartTable">
		<thead>
		<tr>
			<td>Название</td>
			<td>Стоимость</td>
			<td>Количество</td>
			<td>Сумма</td>
		</tr>
		</thead>
		<tbody>
		{{CONTENT}}
		<tr>
			<td colspan="3">Итого</td>
			<td>{{SUM}}</td>
		</tr>
		</tbody>
	</table>
</div>
