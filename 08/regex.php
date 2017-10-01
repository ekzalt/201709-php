<?php

function validateEmail($email) {
  if ( preg_match('/[.]{2,}/', $email) ) return false;

  $pattern = '/^[a-z0-9]+[._-a-z0-9]+@[a-z0-9.]{2,10}\.[a-z]{2,4}$/';
  return (bool) preg_match($pattern, $email);
}

var_dump( validateEmail('vasya@site.com') );

$text = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, perferendis! Aspernatur magni ipsum explicabo nam dicta autem delectus voluptate assumenda laudantium nobis eligendi magnam tenetur nemo, alias saepe repellat ut.';

function removeVowels($str) {
  return preg_replace('/[aeijou\s]/i', '', $str);
}

var_dump( removeVowels($text) );

function validateDate($str) {
  $pattern = '/^[0-3]{1}[0-9]{1}\.[0-1]{1}[0-9]{1}\.\d{4}$/';
  return (bool) preg_match($pattern, $str);
}

var_dump( validateDate('20.09.2017') );

?>