<?php

require_once "./connect.php";

if (isset($_POST["search"]) && isset($_POST["sort"])) {
    $search = $_POST["search"];
    $sort = $_POST["sort"];
    $layout = "";
    $query = "";

    $search == "" ? $query .= "SELECT * FROM `products`" : $query .= "SELECT * FROM `products` WHERE `name` LIKE '%" . $search . "%'";

    switch ($sort) {
        case 'name_asc':
            $query .= "ORDER BY `name` ASC";
            break;
        case 'name_desc':
            $query .= "ORDER BY `name` DESC";
            break;
        case 'sell_asc':
            $query .= "ORDER BY `sell` ASC";
            break;
        case 'sell_desc':
            $query .= "ORDER BY `sell` DESC";
            break;
        case 'qty_asc':
            $query .= "ORDER BY `qty` ASC";
            break;
        case 'qty_desc':
            $query .= "ORDER BY `qty` DESC";
            break;
    }
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $numStr = strrev((int) $row["sell"]);
                // First 3 digits
                $formatted = substr($numStr, 0, 3);
                // Then every 2 digits
                for ($i = 3; $i < strlen($numStr); $i += 2) {
                    $formatted .= ',' . substr($numStr, $i, 2);
                }
                // Reverse back and add ₹ symbol
                $money = '₹' . strrev($formatted) . ".00";
                $sku = $row["id"] + 1000;
                $badge = "";
                $stat = "";
                if ($row["qty"] > $row["alert"]) {
                    $badge = "success";
                    $stat = "In Stock";
                } elseif ($row["qty"] == 0) {
                    $badge = "danger";
                    $stat = "Out of Stock";
                } else {
                    $badge = "warning";
                    $stat = "Low Stock";
                }

                $layout .= "
                    <tr>
                        <td class='px-4 py-4 whitespace-nowrap'>
                            <div class='flex items-center'>
                                <div class='h-10 w-10 flex-shrink-0'>
                                    <img src='../images/" . $row["image"] . "'>
                                </div>
                                <div class='ml-4'>
                                    <div class='text-sm font-medium text-gray-900'>" . $row["name"] . "</div>
                                    <div class='text-xs text-gray-500'>" . $row["brand"] . "</div>
                                </div>
                            </div>
                        </td>
                        <td class='px-4 py-4 whitespace-nowrap text-sm text-gray-500'>SKU-" . $sku . "</td>
                        <td class='px-4 py-4 whitespace-nowrap text-sm text-gray-500'>Fmcg & Stationary</td>
                        <td class='px-4 py-4 whitespace-nowrap text-sm text-gray-900'>" . $money . "</td>
                        <td class='px-4 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["qty"] . "</td>
                        <td class='px-4 py-4 whitespace-nowrap'>
                            <span class='badge badge-" . $badge . "'>" . $stat . "</span>
                        </td>
                        <td class='px-4 py-4 whitespace-nowrap text-right text-sm font-medium'>
                            <button class='text-indigo-600 hover:text-indigo-900 mr-3'>Edit</button>
                            <button class='text-red-600 hover:text-red-900' onclick='prDelete(" . $row["id"] . ")'>Delete</button>
                        </td>
                    </tr>";
            }
            echo $layout;
        } else {
            echo "E2";
        }
    } else {
        echo "E1";
    }
}

// echo $layout . $layout . $layout . $layout;
