<?php

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

require_once './consts.php';
require_once './connect.php'; // Database connection

if (!empty($username) && !empty($password)) {
  $query = "SELECT * FROM `users` WHERE `email` = '" . $username . "' AND `password` = '" . $password . "'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    echo "OK";

  } else {
    echo "E2";
  }
} else {
  echo "E1";
}
