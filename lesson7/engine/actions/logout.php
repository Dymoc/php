<?php

// var_dump($_SESSION);

unset($_SESSION['user']);

// dd($_SESSION);

header('Location: http://' . $_SERVER['HTTP_HOST']. '/');