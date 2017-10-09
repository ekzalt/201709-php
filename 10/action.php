<?php

// echo json_encode($_SERVER['CONTENT_TYPE']); // 'application/json'
echo json_encode($_REQUEST);

/*
if (isset($_POST['login']) && isset($_POST['email'])) { // if by AJAX: $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
  // ajax request
  $login = $_POST['login'] ?? '';
  $email = $_POST['email'] ?? '';
  $response = [
      'success' => false,
      'data' => [],
      'errors' => [],
  ];
  $errors = [];

  if (!$login) $errors['login'] = 'Login is invalid';
  if (!$email) $errors['email'] = 'Email is invalid';

  if ( empty($errors) ) {
    $response['success'] = true;
    $response['data']['login'] = $login;
    $response['data']['email'] = $email;
  } else {
    $response['errors'] = $errors;
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}
*/

?>