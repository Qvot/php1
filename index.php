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
</html><?php

	$a = 1343;
	$b = 0;

	echo $a . ' ' . $b . ' | ';

	$a = $a + $b;
	$b = $a - $b;
	$a = $a - $b;

	echo $a . ' ' . $b . ' | ';

	$a = ( ($a = $a + $b) - ($b = $a - $b) );
	
	echo $a . ' ' . $b;