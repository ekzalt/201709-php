<?php

include_once 'db_config.php';

$mysqli = new mysqli($server, $username, $password, $dbName);

if (isset($_POST['author']) && isset($_POST['message'])) {
  $author = htmlentities( trim($_POST['author']) );
  $message = htmlentities( trim($_POST['message']) );

  if (!$author && !$message) exit('Error Request Data');

  $sqlPost = "INSERT INTO `chat_messages` (author, message) VALUES ('$author', '$message')";
  // echo $sqlPost;
  $mysqli->query($sqlPost);
}

$mysqli->close();

?>