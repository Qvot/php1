<?php
#	возведение в степень
#	@pow - целое число, можно отрицательное
	function power( $val, $pow = 1 ){
		
		if( 0 > $pow ){
			$minus = true;
			$pow *= -1;
		}
		
		if( 0 == $pow ){
			return 1;
		}
		
		if( 1 < $pow ){
			$pow--;
			$val *= power( $val, $pow );
		}
		
		if( $minus ){
			$val = 1 / $val;
		}
		
		return $val;
	}
	