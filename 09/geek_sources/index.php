<?
require_once('dbconfig.php');

// Языковая настройка.
setlocale(LC_ALL, 'ru_RU.CP1251');
date_default_timezone_set('Europe/Moscow');

// Подключение к БД.
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die('No connect with data base');
mysql_query('SET NAMES cp1251');
mysql_select_db(DB_NAME) or die('No data base');

$result = mysql_query('SELECT * FROM articles');
if(!$result) die ('Ошибка базы данных ' . mysql_error());


while ($row = mysql_fetch_assoc($result))
{
	echo $row['id_article'] . '<br/>';
	echo $row['title'] . '<br/>';
	echo $row['content'] . '<br/><hr>';
}

mysql_close();

// echo mysql_num_rows($result);
// mysql_fetch_row();
// mysql_fetch_array(); // MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
// mysql_data_seek($result, $num);

?>