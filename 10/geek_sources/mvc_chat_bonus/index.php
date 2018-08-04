<?php
include_once('startup.php');
include_once('model.php');

// Подключение к БД.
startup();

// Обработка отправки формы.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Получение введенной информации.
	$name = $_POST['name'];
	$text = $_POST['text'];
	
	// Добавление сообщения.
	msg_insert($name, $text);
	
	// Редирект.
	header('Location: index.php');
	die();
}

// Запрос сообщений.
$messages = msg_select();

// Подключение шаблона страницы.
include('tpl.php');
?>
