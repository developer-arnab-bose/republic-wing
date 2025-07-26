<?php

require_once "./connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST["name"];
  $brand = $_POST["brand"];
  $mrp = $_POST["mrp"];
  $sell = $_POST["sell"];
  $cost = $_POST["cost"];
  $unit = $_POST["unit"];
  $qty = $_POST["qty"];
  $low = $_POST["low"];
  $description = $_POST["description"];

  if (isset($name) && isset($brand) && isset($mrp) && isset($sell) && isset($cost) && isset($unit) && isset($qty) && isset($low) && isset($description) && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $data = array(
      "name" => $name,
      "brand" => $brand,
      "mrp" => $mrp,
      "sell" => $sell,
      "cost" => $cost,
      "unit" => $unit,
      "qty" => $qty,
      "low" => $low,
      "description" => $description,
    );

    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($fileExtension, $allowedExtensions)) {
      $newName = 'img_' . bin2hex(random_bytes(16)) . '.' . $fileExtension;
      $destPath = '../images/' . $newName;

      if (move_uploaded_file($fileTmpPath, $destPath)) {

        $sql = "INSERT INTO `products` (`name`, `brand`, `description`, `image`, `mrp`, `sell`, `cost`, `unit`, `qty`, `alert`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
          // Bind parameters: s = string, d = double, i = integer
          mysqli_stmt_bind_param(
            $stmt,
            "ssssdddsii", // 4 strings, 3 doubles, 1 string, 2 integers
            $name,        // s
            $brand,      // s
            $description,       // s
            $newName,           // s
            $mrp,               // d
            $sell,              // d
            $cost,              // d
            $unit,              // s
            $qty,               // d
            $low                // d
          );

          // Execute
          if (mysqli_stmt_execute($stmt)) {
            "OK";
          } else {
            echo "Insert failed: " . mysqli_stmt_error($stmt);
          }

          // Close statement
          mysqli_stmt_close($stmt);
        } else {
          echo "Statement preparation failed: " . mysqli_error($conn);
        }

        // Close DB connection
        mysqli_close($conn);

        // $result = mysqli_query($conn, $query);
      } else {
        echo "E2";
      }
    } else {
      echo "E1";
    }
  }
}
