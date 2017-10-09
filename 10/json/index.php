<?php

// How to make friends with PHP Server and JavaScript JSON ? :)

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_TYPE'] === 'application/json') {
  $readStream = 'php://input';
  $str = file_get_contents($readStream);
  $str = utf8_encode($str);

  $arr = json_decode($str, true);
  $jsonErrDecode = json_last_error();

  if ($jsonErrDecode !== 0) exit('Error JSON Decode');

  // will print PHP assoc array
  // echo print_r($arr);

  $response = json_encode($arr);
  $jsonErrEncode = json_last_error();
  
  if ($jsonErrEncode !== 0) exit('Error JSON Encode');

  header('Content-Type: application/json');
  echo $response;
}

?>