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
	
#	склонение чисел
#	день - 1, 21, 31, 41, 51, 61, 71, 81, 91, 101, 121, 131...
#	дня - 2, 3, 4, 22, 23, 24, 34, 42, 43, 44...
#	дней - 0, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 19, 20, 25, 26...
#	дней(искл.) - 11, 12, 13, 14
#	@titles array( 'день', 'дня', 'дней' );
	function plural( $number, $titles ){
		$val = $number%100;
		if( 11 <= $val && 14 >= $val ){
			return $number .' '. $titles[2];
		}else{
			$val = $number%10;
			if( 1 == $val ){
				return $number .' '. $titles[0];
			}elseif( 2 <= $val && 4 >= $val){
				return $number .' '. $titles[1];
			}else{
				return $number .' '. $titles[2];
			}
		}
	}
	
	function date_plural(){
		return
				plural( date('G'), [ 'час', 'часа', 'часов' ] )
			.	' '
			.	plural( date('i'), [ 'минута', 'минуты', 'минут' ] )
		;
	}