<?php

function login($username, $remember) {
  // Имя не должно быть пустой строкой.
  if ($username == '') return false;
  // Запоминаем имя в сессии
  $_SESSION['username'] = $username;
  // и в cookies, если пользователь пожелал запомнить его (на неделю).
  if ($remember) setcookie('username', $username, time() + 3600 * 24 * 7);
  // Успешная авторизация.
  return true;
}

function logout() {
  // Делаем cookies устаревшими (единственный способ их удаления).
  setcookie('username', '', time() - 1);
  // Сброс сессии, удаляем данные пользователя из сесии: unset() удаляет из массива элемент с переданным ключем
  unset($_SESSION['username']);
}

// Точка входа.

session_start();
$enter_site = false;

// Попадая на страницу login.php, авторизация сбрасывается.
logout();

// Если массив POST не пуст, значит, обрабатываем отправку формы.
if (count($_POST) > 0) $enter_site = login($_POST['username'], $_POST['remember'] == 'on');

// Если вход успешен, переадресуем авторизованного пользователя на одну из страниц сайта.
if ($enter_site) {
  // функция header() пишет в ответ заголовки
  // браузер прочитает заголовок Location и сам сделает редирект на указанную страницу
  header('Location: a.php');
  // если браузер редиректит на другую страницу, то дальше выполнять скрипт этой страницы смысла нет - убиваем его
  exit();
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Вход на сайт</title>
</head>

<body>
  <h1>Вход на сайт</h1>
  <form action="" method="post">
    Введите имя:<br>
    <input type="text" name="username"><br>
    <input type="checkbox" name="remember">Запомнить меня<br>
    <input type="submit" value="Войти">
  </form>

  <div>
    <h2>Logger GET POST COOKIE SESSION</h2>
    <p><?= var_dump($_GET) ?></p>
    <p><?= var_dump($_POST) ?></p>
    <p><?= var_dump($_COOKIE) ?></p>
    <p><?= var_dump($_SESSION) ?></p>
  </div>
</body>
</html>