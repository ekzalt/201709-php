<?php

// global

$var = 'hello';

function printVar() {
  // global $var;
  $var = $GLOBALS['var'];
  echo $var;
}

printVar();

$options = include_once './db.php';

var_dump($options);
var_dump(stat('./db.php'));
var_dump(glob('*.php'));

?>