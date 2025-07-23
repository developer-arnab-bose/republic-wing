<?php

session_start();
$_SESSION['name'] = "";
$_SESSION['id'] = "";

if (empty($_SESSION['name'])) {
  echo "OK";
}
