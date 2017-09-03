<?php

$login = 'admin'; $password = '12345';

function checkAuth($login, $password) {
  $postLogin = $_POST['login'];
  $postLogin = trim($postLogin);

  $postPassword = $_POST['password'];
  $postPassword = trim($postPassword);

  return ($postLogin === $login && $postPassword === $password) ? true : false;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Task 6</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
  <? if (!isset($_POST['login']) || !isset($_POST['password'])) { ?>
  <div class="container">
    <form method="post">
      <div class="form-group">
        <label for="login">login</label>
        <input required class="form-control" name="login" id="login">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input required type="password" class="form-control" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-primary" name="method" value="post">Log in</button>
    </form>
  </div>
  <? } else { ?>
  <div class="container">
    <p><?= checkAuth($login, $password) ? 'Доступ разрешен!' : 'Доступ запрещен!' ?></p>
  </div>
  <? } ?>

  <div class="container">
    <p><strong>Logger: <?= __FILE__ ?></strong></p>
    <p>get:<?= var_dump($_GET) ?></p>
    <p>post:<?= var_dump($_POST) ?></p>
    <p>cookie:<?= var_dump($_COOKIE) ?></p>
    <p>session:<?= var_dump($_SESSION) ?></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>