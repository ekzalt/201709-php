<?php 

// pagination

$db = [
  'host' => 'localhost',
  'user' => 'root',
  'pass' => 'mysql',
  'name' => 'test'
];

$dsn = 'mysql:dbname='.$db['name'].';host='.$db['host'];
$pdo = new PDO($dsn, $db['user'], $db['pass']);

$sth = $pdo->prepare("SELECT * FROM `chat_messages`");
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);

$page = $_GET['page'] ?? 1;
$page = (int) $page;

include_once 'pagination.php';

$pagination = new pagination\Pagination();
var_dump($pagination);

?>