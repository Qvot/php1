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
	
	
	function math_plus( $arg1, $arg2 ){
		return $arg1 + $arg2;
	}
	function math_minus( $arg1, $arg2 ){
		return $arg1 - $arg2;
	}
	function math_multiplication( $arg1, $arg2 ){
		return $arg1 * $arg2;
	}
	function math_division( $arg1, $arg2 ){
		if( 0 == $arg2 ){
			return 'На ноль делить нельзя!';
		}
		return $arg1 / $arg2;
	}
	
	function math_operation( $arg1, $arg2, $operation ){
		switch( $operation ):
			case 'plus':
				$result = math_plus( $arg1, $arg2 );
				break;
			case 'minus':
				$result = math_minus( $arg1, $arg2 );
				break;
			case 'multiplication':
				$result = math_multiplication( $arg1, $arg2 );
				break;
			case 'division':
				$result = math_division( $arg1, $arg2 );
				break;
		endswitch;
		
		return $result;
	}
	
	
#	С помощью цикла do…while написать функцию для вывода чисел от 0 до 10,
#	чтобы результат выглядел так:
#	0 – ноль.
#	1 – нечетное число.
#	2 – четное число.
#	3 – нечетное число.
#	…
#	10 – четное число.
	function numb_list( $numb = 10 ){
		if( ! (is_numeric($numb) && 0 < $numb) ){
			$numb = 10;
		}
		$i = 0;
		do{
			if( 0 == $i ){
				$result[] = $i . ' - ноль.';
			}else{
				if( 0 == $i%2 ){
					$result[] = $i . ' - четное число.';
				}else{
					$result[] = $i . ' - нечетное число.';
				}
			}
			$i++;
		}while( $numb >= $i );
		return implode( '<br>', $result );
	}
	
	
	function translit( $text ){
		$list = [
			'А'=>'A',	'Б'=>'B',	'В'=>'V',
			'Г'=>'G',	'Д'=>'D',	'Е'=>'E',
			'Ё'=>'E',	'Ж'=>'J',	'З'=>'Z',
			'И'=>'I',	'Й'=>'Y',	'К'=>'K',
			'Л'=>'L',	'М'=>'M',	'Н'=>'N',
			'О'=>'O',	'П'=>'P',	'Р'=>'R',
			'С'=>'S',	'Т'=>'T',	'У'=>'U',
			'Ф'=>'F',	'Х'=>'H',	'Ц'=>'TS',
			'Ч'=>'CH',	'Ш'=>'SH',	'Щ'=>'SCH',
			'Ъ'=>'Y',	'Ы'=>'YI',	'Ь'=>'',
			'Э'=>'E',	'Ю'=>'YU',	'Я'=>'YA',
			
			'а'=>'a',	'б'=>'b',	'в'=>'v',
			'г'=>'g',	'д'=>'d',	'е'=>'e',
			'ё'=>'e',	'ж'=>'j',	'з'=>'z',
			'и'=>'i',	'й'=>'y',	'к'=>'k',
			'л'=>'l',	'м'=>'m',	'н'=>'n',
			'о'=>'o',	'п'=>'p',	'р'=>'r',
			'с'=>'s',	'т'=>'t',	'у'=>'u',
			'ф'=>'f',	'х'=>'h',	'ц'=>'ts',
			'ч'=>'ch',	'ш'=>'sh',	'щ'=>'sch',
			'ъ'=>'y',	'ы'=>'yi',	'ь'=>'',
			'э'=>'e',	'ю'=>'yu',	'я'=>'ya'
		];
		return strtr( $text, $list );
	}
	
#	Написать функцию, которая заменяет в строке пробелы на подчеркивания
#	и возвращает видоизмененную строчку.
	function replace_space( $text ){
		return strtr( $text, [ '   '=>'_',	'  '=>'_',	' '=>'_' ] );
	}
	
	
	function text_to_url( $text ){
		
		$list = [
			'а'=>'a',	'б'=>'b',	'в'=>'v',
			'г'=>'g',	'д'=>'d',	'е'=>'e',
			'ё'=>'e',	'ж'=>'j',	'з'=>'z',
			'и'=>'i',	'й'=>'y',	'к'=>'k',
			'л'=>'l',	'м'=>'m',	'н'=>'n',
			'о'=>'o',	'п'=>'p',	'р'=>'r',
			'с'=>'s',	'т'=>'t',	'у'=>'u',
			'ф'=>'f',	'х'=>'h',	'ц'=>'ts',
			'ч'=>'ch',	'ш'=>'sh',	'щ'=>'sch',
			'ъ'=>'y',	'ы'=>'yi',	'ь'=>'',
			'э'=>'e',	'ю'=>'yu',	'я'=>'ya'
		];
		$text = mb_strtolower( $text );
		$text = trim( $text );
		$text = strtr( $text, $list );
		
	#	дополнительная замена символов
	#	по-хорошему нужно использовать регулярку, но мы ее не проходили
		$list_2 = [
			'   '=>'_',	'  '=>'_',	' '=>'_',
			'.'=>'_',	','=>'_'
		];
		$list_3 = [
			'___'=>'_',	'__'=>'_'
		];
		
		$text = strtr( $text, $list_2 );
		$text = strtr( $text, $list_3 );
		$text = trim( $text, '_' );
		
		return $text;
	}
	
	function get_menu( $menus ){
		$html = '<ul>';
		foreach( $menus as $item ){
			$html .= 
					'<li>'
				.		'<a href="'.$item['url'].'">'
				.			$item['name']
				.		'</a>'
				.		( $item['child'] ? get_menu( $item['child'] ) : ''  )
				.	'</li>'
			;
		}
		$html .= '</ul>';
		return $html;
	}