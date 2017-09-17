<?php

// task 1

/*
$n1 = 100500;
$n2 = 0;

var_dump($n1);
var_dump($n2);

// мутирующая функция
function toBool(&$n): bool {
  return settype($n, 'boolean');
}

toBool($n1);
toBool($n2);

var_dump($n1);
var_dump($n2);
*/

/////////////////////////////////////////////////////

// task 2

// create / append
function addToCsv($path, $content) {
  $file = fopen($path, 'a');

  fputcsv($file, $content);
  fclose($file);
}

// read
function readCsv($path) {
  $arr = [];
  $file = fopen($path, 'r');

  while ($row = fgetcsv($file)) $arr[] = $row;

  fclose($file);

  return $arr;
}

$err = '';

if ( isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['position']) ) { // if (!empty($_POST)) {...} || if (count($_POST)) {...}
  $name = trim($_POST['name']);
  $surname = trim($_POST['surname']);
  $position = trim($_POST['position']);

  if (!$name) $err .= 'Имя: нет данных. ';
  if (!$surname) $err .= 'Фамилия: нет данных. ';
  if (!$position) $err .= 'Должность: нет данных. ';

  if ($name && $surname && $position) {
    $user = [
      'name' => $name,
      'surname' => $surname,
      'position' => $position
    ];

    addToCsv('users.csv', $user); // addToCsv('users.csv', [$name, $surname, $position]);
    header('Location: /');
    exit();
  }
}

$users = file_exists('users.csv') ? readCsv('users.csv') : [];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Form</title>
</head>

<body>
  <main>
    <p><?= $err ?></p>

    <form method="post">
      <p><input name="name" placeholder="Имя"></p>
      <p><input name="surname" placeholder="Фамилия"></p>
      <p><input name="position" placeholder="должность"></p>
      <p><button type="submit">Отправить</button></p>
    </form>

    <p><?= var_dump($user) ?></p>
    <p><?= var_dump($users) ?></p>

    <?php if (count($users)) { ?>
      <section>
        <p>Пользователи:</p>
        <ol>
          <?php foreach ($users as $user) { ?>
            <li><?= $user[0] ?> <?= $user[1] ?>, <?= $user[2] ?></li>
          <?php } ?>
        </ol>
      </section>
    <?php } ?>

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