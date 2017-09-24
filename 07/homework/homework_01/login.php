<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Login</title>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Login</h1>

  <form action="index.php" method="post">
    <div class="form-row">
      <input type="text" name="login" placeholder="login" required>
      <?php if (isset($errors['login'])): ?>
        <p class="error"><?= $errors['login'] ?></p>
      <?php endif; ?>
    </div>

    <div class="form-row">
      <input type="password" name="password" placeholder="password" required>
      <?php if (isset($errors['password'])): ?>
        <p class="error"><?= $errors['password'] ?></p>
      <?php endif; ?>
    </div>

    <div class="form-row">
      <button type="submit" name="submit_login" value="submit_login">Отправить</button>
    </div>
  </form>

  <p><a href="reg.php">Регистрация</a></p>
</body>
</html>