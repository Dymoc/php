<?php 

$cacheName = 'posts_' . date('Y_m_d'). '.json';
$cachePath = DOCROOT . 'data/cache/';

if(!file_exists($cachePath . $cacheName)){

	echo "api call <br>";
	$data = file_get_contents('http://jsonplaceholder.typicode.com/posts');
	if(!file_put_contents($cachePath . $cacheName, $data)){
		echo "Не удалось записать в файл";
		die;
	}
}

echo "get from cache <br>";

$posts = file_get_contents($cachePath . $cacheName);

echo $posts;