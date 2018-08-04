<?php

$db = [
  'host' => 'localhost',
  'user' => 'root',
  'pass' => 'mysql',
  'name' => 'test'
];

$dsn = 'mysql:dbname='.$db['name'].';host='.$db['host'];
$pdo = new PDO($dsn, $db['user'], $db['pass']);

$sth = $pdo->prepare("SELECT * FROM `users` WHERE `name` = :user");
$sth->execute(['user' => 'nick']);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);

/*
// PDO Transactions (доп. - Уровень изолированности транзакций)

$pdo->beginTransaction();
$pdo->exec("...");
$pdo->exec("...");
$pdo->rollBack(); // || $pdo->commit();
*/

$sth = $pdo->prepare("SELECT * FROM books INNER JOIN book_to_author ON books.book_id = book_to_author.book_id");
$sth->execute();
$data2 = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($data2);

?>