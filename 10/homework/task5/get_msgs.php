<?php

include_once 'db_config.php';

$phpResponse = [
  'status' => 200,
  'statusText' => 'OK',
  'error' => null,
  'data' => []
];

$mysqli = new mysqli($server, $username, $password, $dbName);

if ($mysqli->connect_errno) {
  printf("Соединение не удалось: %s\n", $mysqli->connect_error);
  exit();
}

/*
$sqlGet = "SELECT * FROM `chat_messages` ORDER BY `msg_id` DESC LIMIT 5";
$res = $mysqli->query($sqlGet);

if ($res->num_rows) {
  while ($row = $res->fetch_assoc()) array_push($phpResponse['data'], $row);
}
*/

/*
!!! защита от sql-injection
http://php.net/manual/ru/book.mysqli.php
http://php.net/manual/ru/mysqli.prepare.php
http://php.net/manual/ru/mysqli-stmt.prepare.php
http://php.net/manual/ru/mysqli-stmt.execute.php
http://php.net/manual/ru/mysqli-stmt.fetch.php
*/

$limitMsgs = 5;
// 1. создаем шаблон запроса
$sqlGet = "SELECT `author`, `message`, `datetime` FROM `chat_messages` ORDER BY `msg_id` DESC LIMIT ?";
// 2. созданем инстанс stmt
$stmt = $mysqli->stmt_init();
// 3. создаем подготавливаемый запрос
$stmt->prepare($sqlGet);
// 4. привязываем переменные к параметрам
$stmt->bind_param("i", $limitMsgs); // d - float, i - integer, s - string, b - binary
// 5. выполняем запрос
$stmt->execute(); // можно переписывать значения переменных $author, $message и вызывать $stmt->execute() несколько раз
// 6. определяем переменные для результата
$stmt->bind_result($author, $message, $datetime);
// 7. выбираем значения
while ($stmt->fetch()) {
  $item = [];
  $item['author'] = $author;
  $item['message'] = $message;
  $item['datetime'] = $datetime;
  array_push($phpResponse['data'], $item);
}
// 8. закрываем запрос
$stmt->close();

$mysqli->close();

$jsonResponse = json_encode($phpResponse);
$jsonErrEncode = json_last_error();

if ($jsonErrEncode !== 0) exit('Error JSON Encode');

header('Content-Type: application/json');
echo $jsonResponse;

?>