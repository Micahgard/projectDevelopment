<?php

include_once "../class/Administrator.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
  $login = new Administrator();
  $login->login($username, $password);

  switch($login->role) {
    case 'senior':
      echo 'senior';
      break;
    case 'assistant':
      echo 'assistant';
      break;
    case 'facility':
      echo 'facility';
      break;
    case 'pharmacy':
      echo 'pharmacy';
      break;
    case 'research':
      echo 'research';
      break;
    case 'clerk':
      echo 'clerk';
      break;
  }
}
