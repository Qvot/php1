<?php


function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	foreach ($variables as $key => $value) {
		if (!is_string($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';
		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}


function createGallery() {
	$result = '';
	
	$sql	= 'SELECT * FROM `images` ORDER BY `views` DESC';
	$images	= getAssocResult( $sql );

	foreach( $images as $image ) {
		if( ! is_file(WWW_DIR . $image['url']) ){
			$image['url'] = 'img/no-image.jpeg';
		}
		$result .= render(TEMPLATES_DIR . 'galleryItem.tpl', [
			'id'	=> $image['id'],
			'src'	=> $image['url'],
			'views'	=> '',#$image['views'],
			'title'	=> $image['title']
		]);
	}
	
	return $result;
}
