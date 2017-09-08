<?php

date_default_timezone_set('UTC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Hello</title>
</head>
<body>
  <main>
    <h1>Hello page</h1>

    <section>
      <h2>Logger</h2>
      <p><?= date('d.m.Y H:i:s') ?></p>
      <p><?= var_dump($_GET) ?></p>
    </section>

    <p><a href="index.php">Index</a></p>
  </main>
</body>
</html>
