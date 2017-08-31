<?php

session_start();

// Если в контексте сессии не установлено имя пользователя, пытаемся взять его из cookies.
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) $_SESSION['username'] = $_COOKIE['username'];

// Еще раз ищем имя пользователя в контексте сессии.
$username = $_SESSION['username'];

// Неавторизованных пользователей отправляем на страницу регистрации.
if ($username == null) {
  header('Location: login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Страница А</title>
</head>

<body>
  <h1>Страница "А"</h1>
  <p><a href="a.php">А</a> и <b>Б</b> сидели на трубе.</p>
  <p>Вы вошли как <b><?= $username ?></b> | <a href="login.php">Выход</a></p>

  <div>
    <h2>Logger GET POST COOKIE SESSION</h2>
    <p><?= var_dump($_GET) ?></p>
    <p><?= var_dump($_POST) ?></p>
    <p><?= var_dump($_COOKIE) ?></p>
    <p><?= var_dump($_SESSION) ?></p>
  </div>
</body>
</html>