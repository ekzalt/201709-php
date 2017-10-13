<?php

// task 6 - migration

$arrLines = [];

$fileCsv = fopen('chat_messages.csv', 'r');

while ($row = fgetcsv($fileCsv)) $arrLines[] = $row;

fclose($fileCsv);

var_dump($arrLines);

////////////////////////////////////////////////////////

$server = 'localhost';
$username = 'root';
$password = 'mysql';
$dbName = 'test';

$mysqli = new mysqli($server, $username, $password, $dbName);

$sqlPost = "INSERT INTO `chat_messages` (author, message) VALUES ";
$arrValues = [];

foreach ($arrLines as $msg) {
  $arrValues[] = "('{$msg[0]}', '{$msg[1]}')";
}

$sqlPost .= implode(',', $arrValues);
var_dump($sqlPost);

$fileSql = fopen('chat_messages.sql', 'a');
fputs($fileSql, "$sqlPost;");
fclose($fileSql);

$mysqli->query($sqlPost);
$mysqli->close();

?>