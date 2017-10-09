<?php

$str = "Lorem ipsum \n\ndolor \n sit\n   amet.";
$re = '/\s+/';

var_dump($str);
var_dump(preg_replace($re, ' ', $str));

?>