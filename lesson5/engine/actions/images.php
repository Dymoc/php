<?php

// get images
$images = [];

$data = [];

// ['url' => '', 'name' => '', '']
// prepare images
foreach ($images as $key => $value) {
	
	$data[] = $value['url'];

}

var_dump($data);