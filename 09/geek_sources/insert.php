<?
require_once('dbconfig.php');

// �������� ���������.
setlocale(LC_ALL, 'ru_RU.CP1251');
date_default_timezone_set('Europe/Moscow');

// ����������� � ��.
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die('No connect with data base');
mysql_query('SET NAMES cp1251');
mysql_select_db(DB_NAME) or die('No data base');

$result = mysql_query('INSERT INTO articles (title,content) 
						VALUES ("����� ������", "����� ����� ������")');
if(!$result) {
	die ('������ ���� ������ ' . mysql_error());
}
else {
	echo '������ ���������: '. mysql_affected_rows();
}

mysql_close();

?>