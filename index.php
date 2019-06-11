<?php
	require( 'function.php' );
	
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
	<p>Возведение в степень:  -3**3 = <?=power( -3, 3 );?></p>
	<p>Текущий время - <?=date_plural()?></p>
</body>
</html>