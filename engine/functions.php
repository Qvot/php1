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
		if (is_array($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}

function gallery( $img_dir ){
	
	$images = scandir( WWW_DIR . $img_dir );
#	var_dump( $images );
	$gallery = '';
	foreach( $images as $image ){
		if( $image == '.' || $image == '..' ){
			continue;
		}
		$gallery .= render( TEMPLATES_DIR . 'gallery.tpl', [
			'src' => '/img/' . $image
		]);
	}
	
	return $gallery;
}
