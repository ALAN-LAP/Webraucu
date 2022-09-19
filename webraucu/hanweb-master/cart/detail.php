<?php
session_start();
require_once "../class/order.php";
$orderObj = new Order();
$orderID =  $_GET["id"];
if (!$orderID) {
    header("Location: history.php");
}
$order = $orderObj->getOrderDetail($orderID);
?>

<html>

<head>
    <link rel="stylesheet" href="../css/boostrap.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php include '../menu.php'; ?>
    <div class="container">
        <h4>History</h4>
        <table class="cart">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Amount</th>
                <th>Price</th>
            </tr>
            <?php
            $count = 0;
            while ($ord  = $order->fetch_assoc()) {
                $count++;
                echo '<tr>
                    <td>'. $count .'</td>
                    <td>'. $ord["VegetableName"] .'</td>
                    <td><img class="product-image" alt="product-image" src="data:image/jpeg;base64,' . $ord["Image"] . '" /></td>
                    <td>'. number_format($ord["Amount"]) .'</td>
                    <td>'. number_format($ord["Price"]) .'</td>
                </tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>