<?php

date_default_timezone_set('Europe/Kiev');

$f = fopen('visits.txt', 'a+');

fwrite($f, date('Y-m-d H:i:s') . "\r\n");
fwrite($f, $_SERVER['REMOTE_ADDR'] . "\r\n");
fwrite($f, $_SERVER['HTTP_REFERER'] . "\r\n");
fwrite($f, "- - - - - - - - -\r\n");

fclose($f);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Наш сайт</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="visits.php">Журнал</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Главная</h1>
    <p>Главная страница "нашего сайта"</p>
    <section>
      <p>Наши партнеры:</p>
      <ul>
        <li><a href="site1.html">Партнер 1</a></li>
        <li><a href="site2.html">Партнер 2</a></li>
      </ul>
    </section>
    <p>Статистика посещений "нашего сайта" напрямую и с сайтов наших партнеров доступна <a href="visits.php">здесь</a></p>

    <div>
      <p><strong>Logger: <?= __FILE__ ?></strong></p>
      <p>get:<?= var_dump($_GET) ?></p>
      <p>post:<?= var_dump($_POST) ?></p>
      <p>cookie:<?= var_dump($_COOKIE) ?></p>
      <p>session:<?= var_dump($_SESSION) ?></p>
      <p>server:<?= var_dump($_SERVER) ?></p>
    </div>
  </main>
</body>
</html>