<?php

$server = 'localhost';
$username = 'root';
$password = 'mysql';
$dbName = 'test';
$pathImgs = 'img/';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $fileId = (int) $_GET['id'];

  $mysqli = new mysqli($server, $username, $password, $dbName);

  $sqlUpdate = "UPDATE files SET clicks = clicks + 1 WHERE id = $fileId";
  $sqlGet = "SELECT * FROM files WHERE id = $fileId";
  
  $mysqli->query($sqlUpdate);
  $res = $mysqli->query($sqlGet);

  $mysqli->close();

  if ($res->num_rows) {
    $file = $res->fetch_assoc();
  } else {
    // заглушка или редирект
  }
  
} else {
  // заглушка или редирект
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Фотография</title>
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
    <h1>Фотография</h1>
    <p>Страница просмотра фотографии</p>
    <h2>Ваша фотография</h2>
    <div><?= var_dump($file) ?></div>
    
    <section>
      <h3><?= $file['name'] ?></h3>
      <p>Переходов на эту фотографию: <strong><?= $file['clicks'] ?></strong></p>
      <div><img src=<?= $pathImgs . $file['name'] ?> alt="pic"></div>
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