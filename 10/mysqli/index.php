<?php

$server = 'localhost';
$username = 'root';
$password = 'mysql';
$dbName = 'test';

$mysqli = new mysqli($server, $username, $password, $dbName);

function getUsers($mysqli) {
  $sqlGet = "SELECT * FROM `users`";
  // $mysqli->prepare();
  $res = $mysqli->query($sqlGet);
  
  $data = [];
  
  if ($res->num_rows) {
    while ($row = $res->fetch_assoc()) $data[] = $row;
  }

  return $data;
}

var_dump(getUsers($mysqli));

$mysqli->close();

?>