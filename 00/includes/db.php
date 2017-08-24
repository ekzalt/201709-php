<?php

$connection = mysql_connect('127.0.0.1', 'login', 'password', 'test_db');

if ($connection == false) {
  echo 'No connection :( <br>';
  echo mysql_error();
  exit();
}

?>
