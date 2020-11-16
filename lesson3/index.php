<?php
// $i = 0;

// //------>>> Задание 1
// echo "Задание 1 <br>";
// while ($i <= 100) {
//      if ($i % 3 == 0) {
//           echo $i . "<br>";
//      }
//      $i++;
// }
// echo "<hr>";


//------>>> Задание 2
// echo "Задание 2 <br>";
// $i = 0;
// do {
//      if ($i == 0) {
//           echo $i . " - ноль <br>";
//      } else if ($i % 2 == 0 && $i > 1) {
//           echo $i . " - четное число <br>";
//      } else {
//           echo $i . " - не четное число <br>";
//      }
//      $i++;
// } while ($i <= 10);
// echo "<hr>";


//------>>> Задание 3
echo "Задание 3 <br>";
$arr = [
     "Московская область" => [
          "Москва",
          "Зеленоград",
          "Клин",
     ],
     "Ленинградская область" => [
          "Санкт-Петербург",
          "Павловск",
          "Всеволожск",
          "Кронштадт",
     ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <?php foreach ($arr as $key => $value) : ?>
          <h3><?= $key . " : "; ?></h3>
          <span><?= implode(", ", $value) ?></span>
     <?php endforeach; ?>
     <hr>





     <!-- //----- Задание 4 -->
     <?= "Задание 4 <br>"; ?>
     <form method="post">
          <input type="text" name="str" id="str">
          <button type="submit">перевести</button>
     </form>
     <br>


     <?php

     // function test($str)
     // {
     //      return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
     // }


     $str = $_POST['str'];

     function transcription($str)
     {
          $alfabet = [
               "а" => "a",
               "б" => "b",
               "в" => "v",
               "г" => "g",
               "д" => "d",
               "е" => "e",
               "ё" => "yo",
               "ж" => "zh",
               "з" => "z",
               "и" => "i",
               "й" => "y",
               "к" => "k",
               "л" => "l",
               "м" => "m",
               "н" => "n",
               "о" => "o",
               "п" => "p",
               "р" => "r",
               "с" => "s",
               "т" => "t",
               "у" => "u",
               "ф" => "f",
               "х" => "kh",
               "ц" => "ts",
               "ч" => "ch",
               "ш" => "sh",
               "щ" => "shch",
               "ь" => "i",
               "ы" => "y",
               "ъ" => "`",
               "э" => "e",
               "ю" => "yu",
               "я" => "ya"
          ];
          $conteiner = [];
          // var_dump(test($str));
          $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);

          foreach ($arr_str as $key => $value) {
               if (array_key_exists($value, $alfabet)) {
                    array_push($conteiner, $alfabet[$value]);
                    implode("", $conteiner);
               } else {
                    array_push($conteiner, $value);
                    implode("", $conteiner);
               }
          }
          return implode("", $conteiner);
     }

     if (array_key_exists('str', $_POST)) {
          print(transcription($str));
     }
     echo "<hr>";
     ?>


     <!-- //----- Задание 5 -->
     <?= "Задание 5 <br>"; ?>
     <form method="post">
          <input type="text" name="str_ing" id="str_ing">
          <button type="submit">Убрать пробелы</button>
     </form>

     <?php

     $str_ing = $_POST['str_ing'];

     function spaceIn($str_ing)
     {
          $prob = "_";
          return str_replace(" ", $prob, $str_ing);
     };
     if (array_key_exists('str_ing', $_POST)) {
          print(spaceIn($str_ing));
     }

     echo "<br>";
     echo "<hr>";
     ?>

     <!-- //----- Задание 6 -->
     <?= "Задание 6 <br>"; ?>
     <ul>
          <?php foreach ($arr as $key => $value) : ?>
               <li><?= $key; ?></li>
               <ul>
                    <?php foreach ($value as $k => $v) : ?>
                         <li><?php print($v); ?></li>
                    <?php endforeach; ?>
               </ul>
          <?php endforeach; ?>
     </ul>
     <hr>


     <!-- //----- Задание 7 -->
     <!-- <?php
          echo "Задание 7 <br>";
          for ($i = 0; $i < 9; $i++, print($i . " ")) {
          };
          ?> -->
     <hr>



     <!-- //----- Задание 8 -->

     <?= "Задание 8 <br>"; ?>

     <?php foreach ($arr as $key => $value) : ?>
          <h3><?= $key . " : "; ?></h3>
          <?php if ($value) : ?>

               <span><?= implode(", ", valid($value)) ?></span>

          <?php endif ?>
     <?php endforeach; ?>

     <?php

     function valid($arr)
     {
          $filter_str = 'К';
          $conteiner = [];
          foreach ($arr as $key => $value) {
               if (preg_split("//u", $value, -1, PREG_SPLIT_NO_EMPTY)[0] == $filter_str) {
                    array_push($conteiner, $value);
               }
          };
          return $conteiner;
     }
     ?>
     <hr>



     <!-- //----- Задание 9 -->
     <?= "Задание 9 <br>"; ?>
     <form method="post">
          <input type="text" name="str_ing_mod" id="str_ing_mod">
          <button type="submit">Запустить</button>
     </form>

     <?php

     $str_ing_mod = $_POST['str_ing_mod'];

     function modify($str_ing_mod)
     {
          return  transcription(spaceIn($str_ing_mod));
     };

     if (array_key_exists('str_ing_mod', $_POST)) {
          print(modify($str_ing_mod));
     };

     echo "<br>";
     echo "<hr>";
     ?>

</body>

</html>