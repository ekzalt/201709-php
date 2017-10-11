<?php

include_once 'db_config.php';

$phpResponse = [
  'status' => 200,
  'statusText' => 'OK',
  'error' => null,
  'data' => []
];

$mysqli = new mysqli($server, $username, $password, $dbName);
$sqlGet = "SELECT * FROM `chat_messages` ORDER BY msg_id DESC LIMIT 5";
$res = $mysqli->query($sqlGet);

if ($res->num_rows) {
  while ($row = $res->fetch_assoc()) array_push($phpResponse['data'], $row);
}

$jsonResponse = json_encode($phpResponse);
$jsonErrEncode = json_last_error();

if ($jsonErrEncode !== 0) exit('Error JSON Encode');

header('Content-Type: application/json');
echo $jsonResponse;

$mysqli->close();

?>