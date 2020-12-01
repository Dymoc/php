<!DOCTYPE html>
<html>
<head>
	<title><?= $message ?></title>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
	<h1><?= isset($code) ? $code . ' ' : '' ?><?= $message ?></h1>
</body>
</html>