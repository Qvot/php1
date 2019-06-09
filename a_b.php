<?php

	$a = 1343;
	$b = 0;

	echo $a . ' ' . $b . ' | ';

	$a = $a + $b;
	$b = $a - $b;
	$a = $a - $b;

	echo $a . ' ' . $b . ' | ';

	$a = ( ($a = $a + $b) - ($b = $a - $b) );
	
	echo $a . ' ' . $b;