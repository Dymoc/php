<?php

if(is_numeric(array_get($_GET, 'id'))){

	$item = $newsModel['find']((int)$_GET['id']);

	//  || $item['status'] !== NEWS_STATUS_ACTIVE
	if(!$item){
		abort(404);
	}

	if(array_get($item, 'img')){
		$item['img'] = '/uploads/img/' . $item['img'];
	}

	$content = view('pages/news_item.view', $item);
	$title = '';
	return require TPL_PATH . 'layout.php';

}

$title = 'Новости';
// ['status' => NEWS_STATUS_ACTIVE]
$data = $newsModel['search']();

$content = view('pages/news.view', ['news' => $data]);

require TPL_PATH . 'layout.php';