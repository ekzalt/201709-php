<?php

date_default_timezone_set('UTC');

$result = 0;
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$action = $_POST['action'];

switch($action) {
  case 'plus':
    $result = $n1 + $n2;
    break;

  case 'minus':
    $result = $n1 - $n2;
    break;

  case 'mult':
    $result = $n1 * $n2;
    break;

  case 'divide':
    $result = ($n1 == 0 || $n2 == 0) ? 0 : $n1 / $n2;
    break;

  default:
    $result = $n1 . $n2;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Calculator</title>
</head>
<body>
  <main>
    <h1>Calculator PHP post</h1>
    <form action="index.php" method="post">
      <p>
        <input name="n1" value="0">
        <input name="n2" value="0">
        <span>=</span>
        <strong><?= $result ?></strong>
      </p>
      <p>
        <button type="submit" name="action" value="plus">+</button>
        <button type="submit" name="action" value="minus">-</button>
        <button type="submit" name="action" value="mult">*</button>
        <button type="submit" name="action" value="divide">/</button>
        <button type="reset">reset</button>
      </p>
    </form>

    <section>
      <h2>Logger</h2>
      <p><?= date('d.m.Y H:i:s') ?></p>
      <p><?= var_dump($_POST) ?></p>
    </section>

    <p><a href="hello.php?page=hello&key=value">hello</a></p>
  </main>
</body>
</html>
