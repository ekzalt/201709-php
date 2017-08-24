<!DOCTYPE html>
<html lang="ru">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>

<body>
<?php

/*
// task 1

$name = 'Alex';
$age = 30;

echo "<p>Меня зовут $name</p>";
echo "<p>Мне $age лет</p>";
*/

/////////////////////////////////////////////////////

/*
task 2

Вычислить площадь равностороннего треугольника по формуле:
S = 1 / 4 * a * (Корень из трех)
где а - сторона треугольника
*/

/*
$a = 20;
// $area = 1 / 4 * $a * (sqrt(3));
$area = (pow($a, 2) * sqrt(3)) / 4;
echo $area;
*/

/////////////////////////////////////////////////////

// task 3

$a = 5; $b = 10; $c = 15;

if ($a < $c) {
  $x = ($a + $b) / ($c * $a);

} elseif ($a === $c) {
  $x = 100;

} else {
  $x = ($c * 3 * $b + $c) / ($c * sqrt($c));
}

echo $x;

?>
</body>
</html>