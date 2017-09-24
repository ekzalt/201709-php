<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Profile</title>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Profile</h1>

  <form action="index.php" method="post">
    <input type="submit" name="log_out" value="Выйти">
  </form>

  <p>Здравствуйте, <?= get_user_name() ?></p>
</body>
</html>