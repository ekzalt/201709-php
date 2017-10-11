<?php

include_once 'db_config.php';

$mysqli = new mysqli($server, $username, $password, $dbName);

if (isset($_POST['author']) && isset($_POST['message'])) {
  $author = $_POST['author'];
  $author = trim($author);
  $author = htmlentities($author);

  $message = $_POST['message'];
  $message = trim($message);
  $message = htmlentities($message);

  if (!$author && !$message) exit('Error Request Data');

  $sqlPost = "INSERT INTO `chat_messages` (author, message) VALUES ('$author', '$message')";
  echo $sqlPost;
  $mysqli->query($sqlPost);
}

$mysqli->close();

?>