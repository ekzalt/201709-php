<?php

// если файла нет include вернет WARNING

// include ('./request.php');
// include './request.php';
// предотвращает подключение 2 и более раза одного и того же файла
// include_once './request.php';

// если файла нет require вернет FATAL_ERROR

// require './request.php';
// предотвращает подключение 2 и более раза одного и того же файла
require_once './request.php';

$storage = '';
$arrPhones;

?>

<form action="request.php" method="post">
  <label>Name <input name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="name"></label>
  <input type="submit" value="Send">
</form>

<div>
  <h2>Logger index.php</h2>
  <p>get:<?= var_dump($_GET) ?></p>
  <p>post:<?= var_dump($_POST) ?></p>
  <p>cookie:<?= var_dump($_COOKIE) ?></p>
  <p>session:<?= var_dump($_SESSION) ?></p>
</div>