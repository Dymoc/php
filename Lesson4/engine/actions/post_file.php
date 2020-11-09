<?php


$uploaddir = DOCROOT . '/data/img/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    echo "Файл " . $_FILES['userfile']['name'] . " успешно загружен.\n";
    echo "Отображаем содержимое\n";
    readfile($_FILES['userfile']['tmp_name']);
} else {
    echo "Возможная атака с участием загрузки файла: ";
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
