<?php

	function math_operation( $arg1, $arg2, $operation ){
		switch( $operation ):
			case 'plus':
			case '+':
				$result = $arg1 + $arg2;
				break;
			case 'minus':
			case '-':
				$result = $arg1 - $arg2;
				break;
			case 'multiplication':
			case '*':
				$result = $arg1 * $arg2 ;
				break;
			case 'division':
			case '/':
				if( 0 == $arg2 ){
					return 'На ноль делить нельзя!';
				}
				$result = $arg1 / $arg2;
				break;
		endswitch;
		
		return $result;
	}