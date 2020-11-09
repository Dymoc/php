<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= $title; ?></title>
</head>
<style>
     .galery_img {
          width: 100px;
          height: 100px;
     }
</style>

<body>

     <h1>Form</h1>

     <?php foreach ($imgs as $key => $value) : ?>
          <a href="<?= '/img/' . $value; ?>" target="_blank"><img class="galery_img" src="<?= '/img/' . $value; ?>" alt="""></a>
     <?php endforeach; ?>
     <br>
     <br>


     <?php
     require(TPL_PATH . 'form.php');
     ?>



</body>

</html>