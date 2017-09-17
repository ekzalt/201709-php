<?php

include_once './resizeImg.php';
include_once './readDirFiles.php';

$pathImgs = 'img/';
$pathImgsSm = 'img_sm/';

// шаг 1 - загрузить файл (опционально)
if (count($_FILES) && isset($_FILES['img']) && $_FILES['img']['name'] && $_FILES['img']['type'] === 'image/jpeg') {
  $fileName = $_FILES['img']['name'];
  $pathTmp = $_FILES['img']['tmp_name'];
  $pathImg = $pathImgs . $fileName;
  $pathImgSm = $pathImgsSm . $fileName;

  copy($pathTmp, $pathImg);
  imageResize($pathImg, $pathImgSm, 50, 50);

  header('Location: /');
  exit();
}

// шаг 2 - создать массивы ссылок из всех имеющихся картинок
$imgs = readDirFiles($pathImgs);
$imgsSm = readDirFiles($pathImgsSm);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Галерея</title>

  <style>
    .img {
      max-width: 300px;
    }
  </style>
</head>

<body>
  <main>
    <h1>Галерея</h1>
    <p>Страница загрузки и просмотра ваших изображений</p>

    <form method="post" enctype="multipart/form-data">
      <label>Загрузите вашу картинку: <input type="file" name="img"></label>
      <button type="submit">Загрузить</button>
    </form>

    <h2>Ваши изображения</h2>
    <div><?= var_dump($imgs) ?></div>
    <div><?= var_dump($imgsSm) ?></div>
    
    <div>
      <?php foreach ($imgs as $key => $val) { // шаг 3 - отобразить ?>
        <div>
          <a href=<?= $imgs[$key] ?> target="_blank">
            <img src=<?= $imgsSm[$key] ?> alt="pic" class="img">
          </a>
        </div>
      <?php } ?>
    </div>

    <div>
      <p><strong>Logger: <?= __FILE__ ?></strong></p>
      <p>get:<?= var_dump($_GET) ?></p>
      <p>post:<?= var_dump($_POST) ?></p>
      <p>files:<?= var_dump($_FILES) ?></p>
      <p>cookie:<?= var_dump($_COOKIE) ?></p>
      <p>session:<?= var_dump($_SESSION) ?></p>
      <p>server:<?= var_dump($_SERVER) ?></p>
    </div>
  </main>
</body>
</html>