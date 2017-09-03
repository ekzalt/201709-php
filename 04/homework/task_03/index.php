<?php

$name = $_POST['name'];

if (!$name) $name = 'Аноним';

?>

<form method="post">
  <input name="name" placeholder="name">
  <button type="submit">Send</button>
</form>

<p>Привет, <strong><?= $name ?></strong></p>

<div>
  <p><strong>Logger: <?= __FILE__ ?></strong></p>
  <p>get:<?= var_dump($_GET) ?></p>
  <p>post:<?= var_dump($_POST) ?></p>
  <p>cookie:<?= var_dump($_COOKIE) ?></p>
  <p>session:<?= var_dump($_SESSION) ?></p>
</div>