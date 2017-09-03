<?php

// http://www.php.su/functions/?preg-replace

$search = [
  "'<script[^>]*?>.*?</script>'si",  // Вырезает javaScript
  "'<[\/\!]*?[^<>]*?>'si",           // Вырезает HTML-теги
  "'([\r\n])[\s]+'",                 // Вырезает пробельные символы
  "'&(quot|#34);'i",                 // Заменяет HTML-сущности
  "'&(amp|#38);'i",
  "'&(lt|#60);'i",
  "'&(gt|#62);'i",
  "'&(nbsp|#160);'i",
  "'&(iexcl|#161);'i",
  "'&(cent|#162);'i",
  "'&(pound|#163);'i",
  "'&(copy|#169);'i",
  "'&#(\d+);'e"                       // интерпретировать как php-код
];                    

$replace = [
  "",
  "",
  "\\1",
  "\"",
  "&",
  "<",
  ">",
  " ",
  chr(161),
  chr(162),
  chr(163),
  chr(169),
  "chr(\\1)"
];

// $text = preg_replace($search, $replace, $document);

$age = 0;

if (isset($_POST['age'])) {
  $age = $_POST['age'];
  $age = trim($age);
  $age = preg_replace($search, $replace, $age);
}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Task 5</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
  <? if (!$age) { ?>
  <div class="container">
    <form method="post">
      <div class="form-group">
        <label for="age">Возраст</label>
        <input required type="number" class="form-control" name="age" id="age">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
  <? } else { ?>
  <div class="container">
    <p>Возраст: <?= $age ?></p>
  </div>
  <? } ?>

  <div class="container">
    <p><strong>Logger: <?= __FILE__ ?></strong></p>
    <p>get:<?= var_dump($_GET) ?></p>
    <p>post:<?= var_dump($_POST) ?></p>
    <p>cookie:<?= var_dump($_COOKIE) ?></p>
    <p>session:<?= var_dump($_SESSION) ?></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>