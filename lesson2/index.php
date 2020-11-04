<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <style>
          .main {
               height: 90vh;
          }

          .date {
               margin-left: 40px;
               padding-top: 5px;
          }

          footer {
               height: 45px;
               background-color: #555;
               color: #fff;
          }
     </style>
</head>

<body>
     <div class="main">
          <?php
          //------>>> задание 1
          echo "Задание 1";
          echo "<br>";

          $a = rand(-15, 15);
          $b = rand(-15, 15);

          echo $a;
          echo "<br>";
          echo $b;
          echo "<br>";


          if ($a >= 0 && $b >= 0) {
               echo "оба чиста положительные : " . ($a - $b);
          } elseif ($a < 0 && $b < 0) {
               echo "оба чиста отрицательные : " . ($a * $b);
          } elseif (($a < 0 || $b > 0) || ($a > 0 || $b < 0)) {
               echo "числа разные : " . ($a + $b);
          } else {
               echo "нет варианта";
          }
          echo "<br>";
          echo "<br>";

          //------>>> задание 2
          echo "Задание 2";
          echo "<br>";

          // break нету что бы выводились по порядку от заданного числа, что бы прерывалось естественно break в каждос case, диапазон немного сократил.
          $a = rand(0, 6);

          switch ($a) {
               case 0:
                    echo 0;
                    echo "<br>";
               case 1:
                    echo 1;
                    echo "<br>";
               case 2:
                    echo 2;
                    echo "<br>";
               case 3:
                    echo 3;
                    echo "<br>";
               case 4:
                    echo 4;
                    echo "<br>";
               case 5:
                    echo 5;
                    echo "<br>";
               case 6:
                    echo 6;
                    echo "<br>";
          }


          echo "<br>";
          echo "<br>";


          //------>>> задание 6
          echo "Задание 6";
          echo "<br>";

          function power($val, $pow)
          {
               if ($pow > 0) {
                    $val *= $val;
                    power($val, $pow - 1);
                    echo "<br>";
                    echo $val;
               }
          }

          //числа для рекурсии
          echo power(2, 3);
          ?>



          <!-- задание 3 и 4-->
          <br>
          <br>
          <p>Задание 3 и 4</p>
          <form action="./result.php">
               <input type="text" name="x1">
               <select name="operation">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
               </select>
               <input type="text" name="x2">
               <input type="submit" value="Посчитать">
          </form>


     </div>
     <footer>

          <!-- задание 5 и 7 -->

          <?php
          function get_hours()
          {
               $hours = date("H");

               switch ($hours) {
                    case 1:
                         return $hours = $hours . " " . "час";
                         break;
                    case 2:
                    case 3:
                    case 4:
                         return $hours = $hours . " " .  "часа";
                         break;
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                    case 11:
                    case 12:
                         return $hours = $hours . " " . "часов";
                         break;
               }
          }

          function get_minuts()
          {
               $minuts = date("i");

               if (
                    $minuts == 0 || ($minuts > 4 && $minuts < 21) || ($minuts > 24 && $minuts < 31) || ($minuts > 34 && $minuts < 41) ||
                    ($minuts > 44 && $minuts < 51) || ($minuts > 54 && $minuts <= 59)
               ) {
                    return $minuts = $minuts . " " . "минут";
               } elseif ($minuts == 1 || $minuts == 21 || $minuts == 31 || $minuts == 41 || $minuts == 51) {
                    return $minuts = $minuts . " " . "минута";
               } elseif (($minuts > 1 && $minuts < 5) || ($minuts > 21 && $minuts < 25) || ($minuts > 31 && $minuts < 35) ||
                    ($minuts > 41 && $minuts < 45) || ($minuts > 51 && $minuts < 55)
               ) {
                    return $minuts = $minuts . " " . "минуты";
               }
          }

          function get_oclock()
          {
               $hours = get_hours();
               $minuts = get_minuts();

               return $hours . " " . $minuts;
          }
          ?>
          <div><?= date("Y") . "- задание 5 и ниже 7" ?></div>
          <div class="date"><?= get_oclock() ?></div>
     </footer>
</body>

</html>