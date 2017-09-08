<?php

include_once './resize.php';

$pathImgs = 'img/';

// шаг 1 - загрузить файл (опционально)
if (count($_FILES) && isset($_FILES['img']) && $_FILES['img']['name'] && $_FILES['img']['type'] === 'image/jpeg') {
  $pathTmp = $_FILES['img']['tmp_name'];
  $pathImg = $pathImgs . $_FILES['img']['name'];
  $pathImgSm = substr_replace($pathImg, '_sm.jpg', -4);

  copy($pathTmp, $pathImg);
  imageResize($pathImg, $pathImgSm, 50, 50);
}

// шаг 2 - создать массив ссылок из всех имеющихся картинок
$images = [];
$dir = opendir($pathImgs);

if ($dir) {
  while ( ( $file = readdir($dir) ) !== false ) {
    if ($file === '.' || $file === '..') continue;

    if (strpos($file, '_sm', 1)) {
      $fileBig = substr_replace($file, '.jpg', -7);

      $images[$fileBig]['small'] = $pathImgs . $file;

    } else {
      $images[$file]['big'] = $pathImgs . $file; 
    }
  }
}

closedir($dir);

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
    <div><?= var_dump($images) ?></div>
    <div>
      <?php foreach ($images as $img) { // шаг 3 - отобразить ?>
        <div>
          <a href=<?= $img['big'] ?> target="_blank">
            <img src=<?= $img['small'] ?> alt="pic" class="img">
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