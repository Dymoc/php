<?php 

define('DOCROOT', __DIR__ . '/../');
define('TPL_PATH', DOCROOT . 'templates/');

require DOCROOT . '/engine/helpers/helper.php';

$title = 'My app';

// $content = require(DOCROOT . '/config/database.php');

// var_dump($content);
// die;

// $content = require(TPL_PATH . 'form.php');
// require('./log.txt');
// require(TPL_PATH . 'layout.php');


// echo "<pre>";
// var_dump($_SERVER['REQUEST_URI']);
// die;
// $config = require(DOCROOT . '/config/database.php');
// var_dump(__DIR__, DOCROOT, DIRECTORY_SEPARATOR);

$uri = explode('/', $_SERVER['REQUEST_URI']);

$action = isset($uri[1]) && $uri[1] ? $uri[1] : 'home';

// // var_dump($action);

// if(!in_array($action, ['home', 'posts'])){
$filePath = DOCROOT .'engine/actions/'. $action .'.php';

// var_dump($filePath);

if(!file_exists($filePath)){
	abort(404);
}

require($filePath);