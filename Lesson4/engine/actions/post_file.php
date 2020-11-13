<?php


$uploaddir = DOCROOT . '/data/img/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


$fileName = $_FILES['userfile']['name'];
$fileSize = $_FILES['userfile']['size'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$allowedfileExtension = array('jpg', 'gif', 'png');

if (in_array($fileExtension, $allowedfileExtension)) {
    if ($fileSize > 20000) {
        echo "Файл " . $_FILES['userfile']['name'] . " слишком большой.\n";
    } else {
        if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
            echo "Файл " . $_FILES['userfile']['name'] . " успешно загружен.\n";
            echo "<br>";
        } else {
            echo "Возможная атака с участием загрузки файла: ";
            echo "<br>";
            echo "файл '" . $_FILES['userfile']['tmp_name'] . "'.";
        }

        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);

        print "</pre>";
    }
} else {
    echo "Файл " . $_FILES['userfile']['name'] . " не соответствует типу загружаемых файлов.\n";
}
