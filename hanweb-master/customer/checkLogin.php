<?php
     session_start(); 
    require_once "../class/customer.php";
    $customer = new Customer();
    $id = $_POST["id"];
    $password = $_POST["password"];
    $result = $customer->login($id, $password);
    echo $result->num_rows;
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['userid'] = $row['CustomerID'];
        $_SESSION['user_fullname'] = $row['FullName'];
        $_SESSION['login_error'] = "";
        $_SESSION['register_error'] = "";
        header("Location: ../vegetable/index.php");
    }
    else {
        $_SESSION['userid'] = "";
        $_SESSION['user_fullname'] = "";
        $_SESSION['login_error'] = "Khong tim thay tai khoan";
        header("Location: login.php");
    }
?>