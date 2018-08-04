<?php

function msg_insert($name, $text)
{
	// Определение текущего времени.
	$dt = date('Y.m.d H:i:s');
	
	// Проверка значений.
	if ($name == '' || $text == '')
		return false;
			
	// Вставка нового сообщения в таблицу.
	$query = "INSERT INTO messages (dt, name, text) VALUES ('$dt', '$name', '$text');";
	$result = mysql_query($query);
							
	if (!$result)
		die(mysql_error());
		
	return true;
}

function msg_select()
{
	// Запрос сообщений.
	$query = "SELECT * FROM messages ORDER BY dt DESC";
	$result = mysql_query($query);
							
	if (!$result)
		die(mysql_error());
	
	// Извлечение сообщений из БД.
	$n = mysql_num_rows($result);
	$messages = array();

	for ($i = 0; $i < $n; $i++)
	{
		$row = mysql_fetch_assoc($result);		
		$messages[] = $row;
	}
	
	return $messages;
}

?>
