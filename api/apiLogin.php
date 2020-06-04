<?php

include_once "../class/Administrator.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
  $login = new Administrator();
  $login->login($username, $password);

  echo $role;

  /*switch($login->role) {
    case 'senior':
      echo 'senior';
      break;
    case 'assistant':
      echo 'assistant';
      break;
  }*/
}
