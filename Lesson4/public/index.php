<?php
define('DOCROOT', __DIR__ . '/../');
define('TPL_PATH', DOCROOT . '/templates/');
define('IMG_PATH', DOCROOT . 'public/img');
define('ACTIONS_PATH', DOCROOT . 'engine/actions/');

$uri = explode('/', $_SERVER['REQUEST_URI']);

$action = isset($uri[1]) && $uri[1] ? $uri[1] : 'home';

$filePath = DOCROOT . 'engine/actions/' . $action . '.php';

if (!file_exists($filePath)) {
     http_response_code(404);
     require(TPL_PATH . '404.php');
     exit;
}

require($filePath);
