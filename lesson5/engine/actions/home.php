<?php 

$title = 'Home';

// var_dump(scandir(DOCROOT));
// die;
	
// var_dump(function_name(7));

// логируем вход пользователя
if(isset($_POST['username']) && $_POST['username']) {
	$filename = DOCROOT . '/data/logs/login' .  date('_Y_m_d') . '.log';
	$handle = fopen($filename, 'a');
	$log = 'User '. $_POST['username'] .' login at ' . date('Y-m-d H:i:s') . PHP_EOL;

	if(!fwrite($handle, $log)){
		echo "Не удалось записать в файл";
	}

	header('Location: http://' . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']);
}


$content = view('forms/login', ['action' => '/login/']);

// $footer = view('header', ['title' => 'Footer']);

require TPL_PATH . 'layout.php';