<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
</head>
<body>
	<?php require( TPL_PATH . './header.php'); ?>
	<?= $content ?>
	<?= isset($footer) ? $footer : '' ?>
	<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>