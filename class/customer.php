<?php
    class Customer
    {
        public function __construct(){}

        public function getByID($id)
        {
            include "../connection.php";
            $sql = "SELECT * FROM `customers` WHERE `CustomerID` = '$id'";
            $result = $conn->query($sql);
            return $result;
        }
        public function login($id, $pass)
        {
            include "../connection.php";
            $sql = "SELECT * FROM `customers` WHERE `CustomerID` = '$id' and `Password` = '$pass' ";
            echo $sql;
            $result = $conn->query($sql, 0);
            return $result;
        }
        public function add($cus)
        {
            include "../connection.php";
            $sql = "INSERT INTO `customers` ". "(Password, FullName, Address, 
            City) ". "VALUES('$cus->Password','$cus->FullName','$cus->Address', '$cus->City')";
            $retval = $conn->query($sql);
            if(! $retval ) {
               return false;
             }
             return true;
        }
    }
?>
