<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
</head>

<body>
	<?php require(TPL_PATH . './header.php'); ?>
	<?= $content ?>
	<?= isset($footer) ? $footer : '' ?>
	<script type="text/javascript" src="/js/main.js"></script>
</body>

</html>