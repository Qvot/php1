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
<?php
	$a = -1343;
	$b = 5;
	echo '<br>-----------------------------------------------<br>';
	
	
	echo $a . ' ' . $b . ' | ';

	$a = $a + $b;
	$b = $a - $b;
	$a = $a - $b;

	echo $a . ' ' . $b . ' | ';

	$a = ( ($a = $a + $b) - ($b = $a - $b) );
	
	echo $a . ' ' . $b;
	echo '<br>-----------------------------------------------<br>';
	
	
	if( 0 <= $a && 0 <= $b ){
		echo 'Разность: ' . ($a - $b);
	}elseif( 0 > $a && 0 > $b ){
		echo 'Произведение: ' . ($a * $b);
	}else{
		echo 'Сумма: ' . ($a + $b);
	}
	echo '<br>-----------------------------------------------<br>';
	
	
#	выводятся числа от 0 до 15 с включением крайних границ
#	предлоги "от" и "до" в разных случаях можно трактовать по разному
#	в остальных случаях можно использовать преинкремент, а также убирать первую и\или последнюю строку из свитча
	$a = 3;
	switch( $a ):
		case '0':	echo $a++;
		case '1':	echo $a++;
		case '2':	echo $a++;
		case '3':	echo $a++;
		case '4':	echo $a++;
		case '5':	echo $a++;
		case '6':	echo $a++;
		case '7':	echo $a++;
		case '8':	echo $a++;
		case '9':	echo $a++;
		case '10':	echo $a++;
		case '11':	echo $a++;
		case '12':	echo $a++;
		case '13':	echo $a++;
		case '14':	echo $a++;
		case '15':	echo $a++;
	endswitch;
	echo '<br>-----------------------------------------------<br>';
	
	?>
</body>
</html>