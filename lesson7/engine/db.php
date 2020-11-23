<?php

$dbConfig = require(DOCROOT . './config/database.php');

ob_start();

$dbConnection = mysqli_connect(
	$dbConfig['host'], 
	$dbConfig['username'],
	$dbConfig['password'], 
	$dbConfig['db']
);

ob_end_clean();

if(!$dbConnection){
	writeLog(mysqli_connect_errno() . ":" . mysqli_connect_error());
	print view('pages/error', ['message' => 'Нет соединения c БД!']);
	exit;
}

// $var = sprintf('test %d', 2);

// var_dump($var);



if(!function_exists('dbGetAll')) {

	function dbGetAll(string $sql): array {

		$dbConnection = $GLOBALS['dbConnection'];

		$res = mysqli_query($dbConnection, $sql);

		if(!$res){
			writeLog(mysqli_error($dbConnection) . ' in (' . $sql . ')');
			return [];
		}

		$data = [];

		while ($row = mysqli_fetch_assoc ($res)) {
			$data[] = $row;
		}

		return $data;
	}

}

if(!function_exists('dbGetRow')) {

	function dbGetRow(string $sql): array {

		$dbConnection = $GLOBALS['dbConnection'];

		$res = mysqli_query($dbConnection, $sql);

		if(!$res){
			writeLog(mysqli_error($dbConnection) . ' in (' . $sql . ')');
			return [];
		}

		$data = mysqli_fetch_assoc ($res);

		return $data ?: [];
	}

}

if(!function_exists('dbEscape')) {

	function dbEscape ($val){

		$dbConnection = $GLOBALS['dbConnection'];

		return mysqli_real_escape_string($dbConnection, htmlspecialchars(strip_tags((string)$val)));
	}
}

if(!function_exists('dbQuery')) {

	function dbQuery (string $sql){

		$dbConnection = $GLOBALS['dbConnection'];

		$res = mysqli_query($dbConnection, $sql);

		if(!$res){
			writeLog(mysqli_error($dbConnection) . ' in (' . $sql . ')');
			return null;
		}

		return $res;
	}
}