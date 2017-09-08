<?php

$users = include_once './db_users.php';

session_name('name2');
session_set_cookie_params(0, '/', 'localhost', 0, 1);
session_start();

if ($_SESSION['login']) {
  header('Location: logout.php');
  exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
  foreach ($users as $user) {
    if ($_POST['login'] === $user['login'] && $_POST['password'] === $user['password']) {
      $_SESSION['login'] = $user['login'];
      
      if ($_SESSION['page']) header("Location: {$_SESSION['page']}");
      else header('Location: /');

      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Login</title>
</head>

<body>
  <main>
    <h1>Login</h1>

    <form method="post">
      <input name="login" placeholder="login">
      <input type="password" name="password" placeholder="password">
      <button type="submit">Log in</button>
    </form>

    <p>users:<?= var_dump($users) ?></p>

    <div>
      <p><strong>Logger: <?= __FILE__ ?></strong></p>
      <p>get:<?= var_dump($_GET) ?></p>
      <p>post:<?= var_dump($_POST) ?></p>
      <p>cookie:<?= var_dump($_COOKIE) ?></p>
      <p>session:<?= var_dump($_SESSION) ?></p>
    </div>
  </main>
</body>
</html>