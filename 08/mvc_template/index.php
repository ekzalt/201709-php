<?php

// Подключение библиотек
require_once('model/gallery.php');

// Загружаем фотографию, если пользователь отправил файл
if (isset($_FILES['photo'])) {
  galleryAdd($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
  header('Locaton: index.php');
  exit();
}

// Подготовка данных
$photos = galleryList();

// Заголовок страницы
$title = 'Gallery';

// Выбор шаблона содержимого
$content = ($_GET['view'] == 'list') ? 'view/content_index_list.php' : 'view/content_index_tiles.php';

// Вывод HTML
include 'view/main.php';

?>