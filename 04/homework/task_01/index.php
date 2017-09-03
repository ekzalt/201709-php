<?php

$city = $_GET['city'];

?>

<form>
  <input name="city" placeholder="city">
  <button type="submit">Send</button>
</form>

<p>Ваш город: <strong><?= $city ?></strong></p>

<div>
  <p><strong>Logger: <?= __FILE__ ?></strong></p>
  <p>get:<?= var_dump($_GET) ?></p>
  <p>post:<?= var_dump($_POST) ?></p>
  <p>cookie:<?= var_dump($_COOKIE) ?></p>
  <p>session:<?= var_dump($_SESSION) ?></p>
</div>