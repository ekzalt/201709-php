<?php

date_default_timezone_set('UTC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Preview</title>

  <style>
    .preview {
      width: 300px;
    }
  </style>
</head>
<body>
  <main>
    <h1>Preview</h1>

    <?php
    for ($i = 1; $i <= 4; $i++) echo "
    <div>
      <a href=\"photo.php?id=$i\">
        <img src=\"img/$i.jpg\" class=\"preview\">
      </a>
    </div>";
    ?>

    <section>
      <h2>Logger</h2>
      <p><?= date('d.m.Y H:i:s') ?></p>
      <p><?= var_dump($_GET) ?></p>
    </section>
  </main>
</body>
</html>
