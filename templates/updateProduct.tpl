<hr>
<form enctype="multipart/form-data" action="" method="POST">
	<input type="hidden" name="id" value="{{ID}}">
	<div>
		Name: <input type="text" name="name" value="{{NAME}}">
	</div>
	<div>
		Description:
		<!-- для textarea значение по умолчанию выглядит так -->
		<textarea name="description" cols="30" rows="10">{{DESCRIPTION}}</textarea>
	</div>
	<div>
		Price: <input type="number" name="price" value="{{PRICE}}">
	</div>
	<div>
		Image: <input name="image" type="file" />
	</div>
	<div>
		<input type="submit">
	</div>
</form>
