<?php

setcookie('name', 'value', time() + 3600, '/', 'localhost', false, true);
header('Location: check.php');
exit();

?>