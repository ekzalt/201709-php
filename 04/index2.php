<?php

// include "./request.php";
// include_once "./request.php";
// require "./request.php";
require_once "./request.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Store - Home</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
  <form method="post">
    <div class="container">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" name="name" id="name"  placeholder="Enter Name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input required type="text" class="form-control" name="price" id="price"  placeholder="Enter Price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea required id="description" class="form-control" name="description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </form>

  <?= var_dump($arPhones) ?>
  <? if ( count($arPhones) > 0 ) { ?>
    <div class="row">
      <? foreach ($arPhones as $phone) { ?>
        <div class="col">
          <h3><?= $phone['name'] ?></h3>
          <h4><?= $phone['price'] ?></h4>
          <p><?= $phone['description'] ?></p>
        </div>
      <? } ?>
    </div>
  <? } ?>

  <div>&lt;script&gt;alert('XSS');&lt;/script&gt;</div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>