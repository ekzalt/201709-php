<?php

$content = 'Здесь будет содержимое вашего файла';

if (count($_FILES) && isset($_FILES['text']) && $_FILES['text']['name'] && $_FILES['text']['type'] === 'text/plain') {
  $arrLines = file($_FILES['text']['tmp_name']);
  $content = '';

  foreach ($arrLines as $key => $value) {
    // $arrLines[$key] = rtrim($value);
    $content .= rtrim($value) . '<br>';
  }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Загрузка</title>
</head>

<body>
  <main>
    <h1>Загрузка</h1>
    <p>Страница загрузки текстовых файлов</p>
    
    <form method="post" enctype="multipart/form-data">
      <label>Загрузите ваш *.txt файл: <input type="file" name="text"></label>
      <button type="submit">Загрузить</button>
    </form>

    <h2>Содержимое</h2>
    <p><?= $content ?></p>

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