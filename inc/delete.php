<?php

require_once "connect.php";
if(isset($_POST["id"])) {
  $id = $_POST["id"];
  $query = "DELETE FROM `products` WHERE `products`.`id` = 10";

  $deleteResult = mysqli_query($conn, $query);
  if(mysqli_num_rows($deleteResult) >= 0){
    echo "OK";
  } else {
    echo "E1";
  }
}

?>