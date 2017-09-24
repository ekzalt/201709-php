<?php

$googleRecaptchaPublic = '';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Registry</title>

  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
  <h1>Registry</h1>

  <form action="index.php" method="post">
    <p>login и password должны быть одинаковыми</p>
    <div class="form-row"><input name="login" placeholder="login" required></div>
    <div class="form-row"><input type="password" name="password" placeholder="password" required></div>
    <div class="g-recaptcha" data-sitekey="<?= $googleRecaptchaPublic ?>"></div>

    <div class="form-row">
      <button type="submit" name="submit_reg" value="submit_reg">Отправить</button>
      <button type="reset">Сбросить</button>
    </div>
  </form>
</body>
</html>