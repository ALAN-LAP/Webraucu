<?php
session_start();
require_once "../class/order.php";
$orderObj = new Order();
$cusID =  $_SESSION['userid'];
if (!$cusID) {
    header("Location: ../customer/login.php");
}
$order = $orderObj->getAllOrder($cusID);
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
                <th>Date</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>
            <?php
            $count = 0;
            while ($ord  = $order->fetch_assoc()) {
                $count++;
                echo '<tr>
                    <td>'. $count .'</td>
                    <td>'. $ord["Date"] .'</td>
                    <td>'. number_format($ord["Total"]) .'</td>
                    <td><form action="detail.php?id='. $ord["OrderID"] .'" method="post"><button type="submit" class="btn btn-primary">Detail</button></form></td>
                </tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>