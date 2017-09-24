<?php

function is_user_logged_in() {
  return !empty($_SESSION['user_id']);
}

function log_in($user) {
  // $id = $id ?? microtime(true);
  // $_SESSION['user_id'] = (int) $id;
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['user_login'] = $user['login'];
}

function get_user_name() {
  if (!is_user_logged_in()) return '';

  return $_SESSION['user_login'];
}

function log_out() {
  $_SESSION['user_id'] = null;
  $_SESSION['user_login'] = null;
}

function verifyGoogleRecaptcha($key, $val) {
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$val;
  $verifyResponse = file_get_contents($url);
  return json_decode($verifyResponse);
}

?>