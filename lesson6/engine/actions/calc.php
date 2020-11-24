<?php

$title = 'Калькулятор';


require TPL_PATH . 'layout.php';

require TPL_PATH . 'pages/calc.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {


     if (empty($_POST)) {
          echo 'Ничего не передано!';
          die;
     }

     if (!array_get($_POST, 'operation')) {
          echo 'Не передана операция';
          die;
     }


     if (!array_get($_POST, 'x1') || !array_get($_POST, 'x2')) {
          var_dump($_POST['x1'], $_POST['x2']);
          echo 'Не переданы аргументы';
          die;
     } else {

          $x1 = $_POST['x1'];
          $x2 = $_POST['x2'];

          $expression = $x1 . ' ' . $_POST['operation'] . ' ' . $x2 . ' = ';


          switch ($_POST['operation']) {
               case '+':
                    $result = $x1 + $x2;
                    break;
               case '-':
                    $result = $x1 - $x2;
                    break;
               case '*':
                    $result = $x1 * $x2;
                    break;
               case '/':
                    if ($x1 == 0 || $x2 == 0) {
                         echo 'Деление на ноль невозможно';
                    } else {
                         $result = $x1 / $x2;
                         break;
                    }
               default:
                    return 'Операция не поддерживается';
          }
     }

     require TPL_PATH . 'pages/result.php';

     $content = view('pages/result', ['result' => $result]);
}
