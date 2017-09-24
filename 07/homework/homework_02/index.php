<?php

$db = 'user_id.txt';
$googleRecaptchaSecret = '';

require_once './functions.php';

session_start();

if ( !is_user_logged_in() ) {
  $errors = [];

  // обработка post-запроса с login.php
  if ( isset($_POST['submit_login']) ) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    /*
    if (strlen($login) > 15 || strlen($login) < 5) $errors['login'] = 'Поле login должно быть от 5 до 15 символов';
    if (strlen($password) > 15 || strlen($password) < 5) $errors['password'] = 'Поле password должно быть от 5 до 15 символов';
    if ( empty($errors) ) {
      // code
    }
    */

    if ($login && $password && $login === $password) {
      // ищем пользователя в базе по логину
      if ( !file_exists($db) ) exit();

      $file = fopen($db, 'r');
      $content = fgets($file);
      fclose($file);
      $user = unserialize($content);

      if ( !is_array($user) ) exit();

      if ( password_verify($password, $user['password_hash']) ) {
        log_in($user);
        header('Location: index.php');
        exit();
      }

    } else {
      // добавить ошибку в массив и редирект на логин
      header('Location: login.php');
      exit();
    }

  // обработка post-запроса с reg.php
  } elseif ( isset($_POST['submit_reg']) ) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $recaptcha = $_POST['g-recaptcha-response'] ?? '';

    if ($login && $password && $recaptcha && $login === $password) {
      // 1. проверить капчу, 2. записать данные в базу и редирект на логин
      $responseData = verifyGoogleRecaptcha($googleRecaptchaSecret, $recaptcha);

      if ($responseData->success) {
        $data = [
          'id' => (int) microtime(true),
          'login' => $login,
          'password_hash' => password_hash($password, PASSWORD_DEFAULT)
        ];
  
        $strData = serialize($data);
        $file = fopen($db, 'w');
        fputs($file, $strData);
        fclose($file);
  
        header('Location: login.php');
        exit();
  
      }

    } else {
      // добавить ошибку в массив и редирект на регистрацию
      header('Location: reg.php');
      exit();
    }
  }

  include './login.php';

} else {
  // показать личный кабинет
  if ( !empty($_POST['log_out']) ) {
    log_out();
    header('Location: index.php');
    exit();
  }
  
  include './profile.php';
}

?>