<?php

session_name('name2');
session_set_cookie_params(0, '/', 'localhost', 0, 1);
session_start();

// session_unset(); // устарело
$_SESSION['login'] = '';
// session_destroy(); // не рекомендуется

header('Location: login.php');

?>