// $.post({
// 	url: '/action.php?id=1',
// 	data: {a: 1}
// });


function setOrderStatusCancel(id) {
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'setOrderStatusCancel',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				$('.order-' + id +  ' .order_status').text( 'Заказ отменен' );
			} else {
				alert(data);
			}
		}
	});
}

function setOrderStatusPaid(id) {
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'setOrderStatusPaid',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				$('.order-' + id +  ' .order_status').text( 'Заказ оплачен' );
			} else {
				alert(data);
			}
		}
	});
}

function setOrderStatusDelivery(id) {
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'setOrderStatusDelivery',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				$('.order-' + id +  ' .order_status').text( 'Заказ доставлен' );
			} else {
				alert(data);
			}
		}
	});
}
