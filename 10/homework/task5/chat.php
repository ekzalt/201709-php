<?php

$title = 'Chat';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?= $title ?></title>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>header</header>

  <main class="container">
    <h1><?= $title ?></h1>

    <section id="messages" class="messages">Loading...</section>

    <form action="post_msg.php" method="post" name="chatForm">
      <div>
        <p><label for="author">Name</label></p>
        <p><input type="text" name="author" id="author" placeholder="Name" required class="fieldForm"></p>
      </div>
      <div>
        <p><label for="message">Message</label></p>
        <p><textarea name="message" id="message" placeholder="Message" required class="fieldForm"></textarea></p>
      </div>
      <div>
        <p><button type="submit">Send</button></p>
      </div>
    </form>
  </main>

  <footer>footer</footer>

  <script src="main.js"></script>
</body>
</html>
