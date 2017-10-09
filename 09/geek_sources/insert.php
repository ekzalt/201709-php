<?
require_once('dbconfig.php');

// Языковая настройка.
setlocale(LC_ALL, 'ru_RU.CP1251');
date_default_timezone_set('Europe/Moscow');

// Подключение к БД.
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die('No connect with data base');
mysql_query('SET NAMES cp1251');
mysql_select_db(DB_NAME) or die('No data base');

$result = mysql_query('INSERT INTO articles (title,content) 
						VALUES ("Новая статья", "Новый текст статьи")');
if(!$result) {
	die ('Ошибка базы данных ' . mysql_error());
}
else {
	echo 'Статей добавлено: '. mysql_affected_rows();
}

mysql_close();

?>