<?php

// Forms

// $_GET
// $_POST

include('includes/db.php');

echo $login = $_POST['login'];
echo $password = $_POST['password'];

$result = mysql_query($connection, "SELECT * FROM `users` WHERE `login` = `$login` AND `password` = `$password`");

if (mysql_num_rows($result) == 0) {
  echo 'No result';
} else {
  $user = mysql_fetch_assoc($result);
  echo 'Hello ' . $user['login'];
}

?>
