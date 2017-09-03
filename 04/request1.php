<?php

echo __FILE__;
var_dump(__FILE__);

if (isset($_POST['username'])) echo "<p>Hello, {$_POST['username']}!</p>";

?>

<div>
  <h2>Logger request.php</h2>
  <p>get:<?= var_dump($_GET) ?></p>
  <p>post:<?= var_dump($_POST) ?></p>
  <p>cookie:<?= var_dump($_COOKIE) ?></p>
  <p>session:<?= var_dump($_SESSION) ?></p>
</div>