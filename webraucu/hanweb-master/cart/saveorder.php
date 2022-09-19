<?php
     session_start();
     if (!$_SESSION['userid']){
        header("Location: ../customer/login.php");
     }
     require_once "../class/order.php";
    
    $orders = new stdClass();
    $orderDetail = $_SESSION['cart'];
    $orders->CustomerID = $_SESSION["userid"];
    $orders->Total = $_SESSION["cart_total"];
    $orders->Note = "";
    $order = new Order();
    $result = $order->addOrder($orders, $orderDetail);
    if($result){
        $_SESSION['cart'] = array();
        $_SESSION['cart_total'] = 0;
        header("Location: history.php");
    }
    else{
    }
?>
