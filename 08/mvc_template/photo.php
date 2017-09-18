<?php

// Подключение библиотек
require_once('model/gallery.php');

// Подготовка данных
$photo = galleryItem($_GET['id']);

// Заголовок страницы
$title = 'Photo';

// Выбор шаблона содержимого
$content = 'view/content_photo.php';

// Вывод HTML
include 'view/main.php';

?>