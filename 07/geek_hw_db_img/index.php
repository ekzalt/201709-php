<?php

include_once './resizeImg.php';

$server = 'localhost';
$username = 'root';
$password = 'mysql';
$dbName = 'test';
$pathImgs = 'img/';
$pathImgsSm = 'img_sm/';

$mysqli = new mysqli($server, $username, $password, $dbName);

// шаг 1 - загрузить файл (опционально)
if (count($_FILES) && isset($_FILES['img']) && $_FILES['img']['name'] && $_FILES['img']['type'] === 'image/jpeg') {
  // прибавляем время в секундах к имени фото, чтобы сделать имя уникальным
  $fileName = time() . '_' . $_FILES['img']['name'];
  $mimeType = $_FILES['img']['type'];
  $pathTmp = $_FILES['img']['tmp_name'];
  $pathImg = $pathImgs . $fileName;
  $pathImgSm = $pathImgsSm . $fileName;

  copy($pathTmp, $pathImg);
  imageResize($pathImg, $pathImgSm, 50, 50);

  $sqlPost = "INSERT INTO files (name, mime) VALUES ('$fileName', '$mimeType')";
  $mysqli->query($sqlPost);
  
  $mysqli->close();
  header('Location: /');
  exit();
}

// шаг 2 - создать массив файлов из базы
$files = [];

$sqlGet = "SELECT * FROM files ORDER BY clicks DESC";
$res = $mysqli->query($sqlGet);

$mysqli->close();

if ($res->num_rows) {
  while ($row = $res->fetch_assoc()) $files[] = $row;
}

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
  <header>
    <nav>
      <ul>
        <li><a href="/">Главная</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Галерея</h1>
    <p>Страница загрузки и просмотра ваших изображений</p>

    <form method="post" enctype="multipart/form-data">
      <label>Загрузите вашу картинку: <input type="file" name="img"></label>
      <button type="submit">Загрузить</button>
    </form>

    <h2>Ваши изображения</h2>
    <div><?= var_dump($files) ?></div>
    
    <section>
      <?php foreach ($files as $file) { // шаг 3 - отобразить ?>
        <section>
          <h3><?= $file['name'] ?></h3>
          <p>Количество кликов по этой фотографии: <strong><?= $file['clicks'] ?></strong></p>
          <div>
            <a href=<?= 'photo.php?id=' . $file['id'] ?>>
              <img src=<?= $pathImgsSm . $file['name'] ?> alt="pic" class="img">
            </a>
          </div>
        </section>
      <?php } ?>
    </section>

    <section>
      <p><strong>Logger: <?= __FILE__ ?></strong></p>
      <p>get:<?= var_dump($_GET) ?></p>
      <p>post:<?= var_dump($_POST) ?></p>
      <p>files:<?= var_dump($_FILES) ?></p>
      <p>cookie:<?= var_dump($_COOKIE) ?></p>
      <p>session:<?= var_dump($_SESSION) ?></p>
      <p>server:<?= var_dump($_SERVER) ?></p>
    </section>
  </main>
</body>
</html>