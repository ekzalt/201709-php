<?php

session_name('name2');
session_set_cookie_params(0, '/', 'localhost', 0, 1);
session_start();

if (!$_SESSION['login']) {
  header('Location: login.php');
  exit();
}

$_SESSION['page'] = 'inner.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Inner</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="inner.php">Inner</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Inner</h1>
    <p>Inner page for, <strong><?= $_SESSION['login'] ?></strong>!</p>

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