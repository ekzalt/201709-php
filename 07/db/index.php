<?php

// настройки подключения
$server = 'localhost';
$username = 'root';
$password = 'mysql';
$dbName = 'test';

/////////////////////////////////////////////////////

// устаревшие инструкции - не работают в PHP 7+

/*
// Соединение с БД (синтаксис)

int mysql_connect (
  [ string $server = ini_get("mysql.default_host") [,
  string $username = ini_get("mysql.default_user") [,
  string$password = ini_get("mysql.default_password") [,
  bool $new_link = false [,
  int $client_flags = 0]]]]]
)

Возвращает дескриптор-ресурс или false
*/

/*
// устанавливаем соединение
$connection = mysql_connect($server, $username, $password);

// int mysql_select_db(string $dbname [, int $link_identifier])

// выбираем базу данных
mysql_select_db($dbName); // устарело и не работает в PHP 7+ !!!

// int mysql_query(string $query [, int $link_identifier])

// посылаем запрос в БД на синтаксисе SQL - возвращает ресурс
$result = mysql_query('SELECT * FROM `people`');

// int mysql_num_rows(int $result)

// проверяем, есть ли какие-то результаты
$count = mysql_num_rows($result);

// array mysql_fetch_array(int $result)
// array mysql_fetch_assoc(int $result)

// будем заполнять массив мини-массивами
$arr = [];

// парсим ресурс - на каждой итерации возвращает ассоциативный мини-массив (строку таблицы)
while ($row = mysql_fetch_assoc($result)) $arr[] = $row;

var_dump($arr);
*/

/*
// int mysql_affected_rows([resource $link_identifier])
// Функция возвращает число строк, затронутых последним запросом INSERT, UPDATE или DELETE.

mysql_query("DELETE FROM emps WHERE id_dept='2'");

$count = mysql_affected_rows();

echo 'Уволены все сотрудники из отдела маркетинга. Их было $count чел.';
*/

/*
int mysql_errno([ int $link_identifier])
string mysql_error([ int $link_identifier])

Если в процессе работы с MySQL возникают ошибки, 
то сообщение об ошибке и ее номер можно получить с помощью этих двух функций. 

Первая возвращает номер последней зарегистрированной ошибки. 

Вторая - строку, содержащую текст сообщения об ошибке. Ее удобно применять в отладочных целях.
*/

/*
$result = mysql_query($query_text);

if ($result === false) {
  $err_code = mysql_errno();
  $err_text = mysql_error();

  die("Ошибка MySQL #$err_code: $err_text" . "<br/>" . "при выполнении SQL запроса: query_text");
}
*/

/////////////////////////////////////////////////////

/*
http://php.net/manual/ru/set.mysqlinfo.php
*/

/////////////////////////////////////////////////////

// Современный вариант - процедурный стиль

/*
// устанавливаем соединение
$connection = mysqli_connect($server, $username, $password, $dbName);

// если произошла ошибка при подключении
if (mysqli_connect_errno($mysqli)) {
  echo 'Не удалось подключиться к MySQL: ' . mysqli_connect_error();
}

// посылаем запрос в БД на синтаксисе SQL - возвращает ресурс
$result = mysqli_query($connection, 'SELECT * FROM `people`');

// проверяем, есть ли какие-то результаты
var_dump($result);
echo "result field_count: {$result->field_count}, result num_rows: {$result->num_rows}";

// после получения всех данных - закрываем соединение с БД
mysqli_close($connection);

// будем заполнять массив мини-массивами
$arr = [];

// парсим ресурс - на каждой итерации возвращает ассоциативный мини-массив (строку таблицы)
while ($row = mysqli_fetch_assoc($result)) $arr[] = $row;

var_dump($arr);
*/

/////////////////////////////////////////////////////

// Современный вариант - ООП стиль

// устанавливаем соединение - создаем объект, инстанс класса mysqli
$mysqli = new mysqli($server, $username, $password, $dbName);

echo '<p>$mysqli - объект-инстанс класса mysqli со встроенными свойствами и методами: $mysqli->connect_errno, $mysqli->connect_error, $mysqli->query($str) $mysqli->close() и т.д.</p>';
var_dump($mysqli);

// если произошла ошибка при подключении - пользуемся свойствами объекта $mysqli
if ($mysqli->connect_errno) {
  echo 'Не удалось подключиться к MySQL: ' . $mysqli->connect_error;
}

// посылаем запрос в БД на синтаксисе SQL (возвращает ресурс) - пользуемся методом объекта $mysqli
$res = $mysqli->query('SELECT * FROM `people`');

echo '<p>$res - объект-ресурс со встроенными свойствами и методами: $res->field_count, $res->num_rows, $res->fetch_assoc() и т.д.</p>';
var_dump($res);

// проверяем, есть ли какие-то результаты - пользуемся свойствами объекта-ресурса $res
echo "result field_count: {$res->field_count}, result num_rows: {$res->num_rows}";

// после получения всех данных - закрываем соединение с БД
$mysqli->close();

// будем заполнять массив мини-массивами
$arr = [];

/*
парсим ресурс
на каждой итерации возвращает ассоциативный мини-массив (строку таблицы)
пользуемся методом объекта-ресурса $res
*/
while ($row = $res->fetch_assoc()) $arr[] = $row;

var_dump($arr);

?>