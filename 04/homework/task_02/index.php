<?php

//

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Task 2</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
  <? if (!isset($_POST['name']) && !isset($_POST['price']) && !isset($_POST['description'])) { ?>
  <div class="container">
    <form method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" name="name" id="name"  placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input required type="text" class="form-control" name="price" id="price"  placeholder="Enter Price">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea required id="description" class="form-control" name="description"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
  <? } ?>

  <div class="container">
    <h1>Data</h1>
    <p>name: <strong><?= $_POST['name'] ?></strong></p>
    <p>price: <strong><?= $_POST['price'] ?></strong></p>
    <p>description: <strong><?= $_POST['description'] ?></strong></p>
  </div>

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