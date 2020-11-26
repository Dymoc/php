<?php

$title = 'Калькулятор';


require TPL_PATH . 'layout.php';

require TPL_PATH . 'pages/calc_new.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {


     var_dump($_GET);
     die;


     // $x1 = $_GET['x1'];
     // $x2 = $_GET['x2'];

     // $expression = $x1 . ' ' . $_POST['operation'] . ' ' . $x2 . ' = ';


     // switch ($_POST['operation']) {
     //      case '+':
     //           $result = $x1 + $x2;
     //           break;
     //      case '-':
     //           $result = $x1 - $x2;
     //           break;
     //      case '*':
     //           $result = $x1 * $x2;
     //           break;
     //      case '/':
     //           if ($x1 == 0 || $x2 == 0) {
     //                echo 'Деление на ноль невозможно';
     //           } else {
     //                $result = $x1 / $x2;
     //                break;
     //           }
     //      default:
     //           return 'Операция не поддерживается';
     // }



     require TPL_PATH . 'pages/result.php';

     $content = view('pages/result', ['result' => $result]);
}
