<?php

if (isset($_COOKIE['name']) && $_COOKIE['name'] === 'value') {
  echo 'cookie enabled';
  var_dump($_COOKIE);
  
} else {
  echo 'cookie disabled';
}

?>