<?php

$arrLines = [];

if ( file_exists('visits.txt') ) {
  $arrLines = file('visits.txt');

  foreach ($arrLines as $key => $value) $arrLines[$key] = rtrim($value);
}

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
    <h1>Журнал</h1>
    <p>Журнал посещаемости "нашего сайта"</p>
    <p>arrLines:<?= var_dump($arrLines) ?></p>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>IP</th>
          <th>Referer</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($arrLines); $i += 4) { ?>
          <tr>
            <td><?= $arrLines[$i] ?></td>
            <td><?= $arrLines[$i + 1] ?></td>
            <td><?= $arrLines[$i + 2] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

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