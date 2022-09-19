<?php
     session_start(); 
    require_once "../class/customer.php";
    
    $cus = new stdClass();
    $cus->FullName = $_POST["fullname"];
    $cus->Password = $_POST["password"];
    $cus->Address = $_POST["address"];
    $cus->City = $_POST["city"];
    $customer = new Customer();
    $result = $customer->add($cus);
    if($result){
        $_SESSION['userid'] = "";
        $_SESSION['user_fullname'] = "";
        $_SESSION['login_error'] = "";
        $_SESSION['register_error'] = "";
        header("Location: login.php");
    }
    else {
        $_SESSION['userid'] = "";
        $_SESSION['user_fullname'] = "";
        $_SESSION['login_error'] = "";
        $_SESSION['register_error'] = "Dang ki that bai";
        header("Location: register.php");
    }
?>