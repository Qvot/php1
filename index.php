<?php
	$year	= date( 'Y' );
	$title	= 'Произвольный заголовок документа | ' . $year;
	$h1		= 'Главный заголовок';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$title;?></title>
	</head>
<body>
	<h1><?=$h1;?></h1>
	<p>Текущий год - <?=$year?></p>
</body>
</html>