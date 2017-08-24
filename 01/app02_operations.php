<?php

$a = 10;
$b = '5';
$c = '123abc';

echo $a + $b; // произойдет неявное преобразование
echo '</br>';

echo $a + (int)$b;
echo '</br>';

echo $a + (int)$c; // bool | string | float
echo '</br>';

$d = 9.1;
$e = '1.9';

echo $d + $e;
echo '</br>';

/////////////////////////////////////////////////

echo round($d);
echo '</br>';

echo round($d, 2); // 2й аргумент - количество знаков после запятой
echo '</br>';

echo round(($d / $e), 2);
echo '</br>';

echo floor($d);
echo '</br>';

echo ceil($d);
echo '</br>';

/////////////////////////////////////////////////

// меняет тип переменной

settype($e, 'float');

?>