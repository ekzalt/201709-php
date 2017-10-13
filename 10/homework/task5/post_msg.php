<?php

include_once 'db_config.php';

$mysqli = new mysqli($server, $username, $password, $dbName);

if ($mysqli->connect_errno) {
  printf("Соединение не удалось: %s\n", $mysqli->connect_error);
  exit();
}

if (isset($_POST['author']) && isset($_POST['message'])) {
  // !!! защита от XSS
  $author = htmlentities( trim($_POST['author']) );
  $message = htmlentities( trim($_POST['message']) );

  if (!$author && !$message) exit('Error Request Data');

  /*
  $sqlPost = "INSERT INTO `chat_messages` (`author`, `message`) VALUES ('$author', '$message')";
  // echo $sqlPost;
  $mysqli->query($sqlPost);
  */

  /*
  !!! защита от sql-injection
  http://php.net/manual/ru/book.mysqli.php
  http://php.net/manual/ru/mysqli.prepare.php
  http://php.net/manual/ru/mysqli-stmt.prepare.php
  http://php.net/manual/ru/mysqli-stmt.execute.php
  http://php.net/manual/ru/mysqli-stmt.fetch.php
  */

  // 1. создаем шаблон запроса
  $sqlPost = "INSERT INTO `chat_messages` (`author`, `message`) VALUES (?, ?)";
  // 2. созданем инстанс stmt
  $stmt = $mysqli->stmt_init();
  // 3. создаем подготавливаемый запрос
  $stmt->prepare($sqlPost);
  // 4. привязываем переменные к параметрам
  $stmt->bind_param("ss", $author, $message); // d - float, i - integer, s - string, b - binary
  // 5. выполняем запрос
  $stmt->execute(); // можно переписывать значения переменных $author, $message и вызывать $stmt->execute() несколько раз
  // 6. закрываем запрос
  $stmt->close();
}

$mysqli->close();

?>