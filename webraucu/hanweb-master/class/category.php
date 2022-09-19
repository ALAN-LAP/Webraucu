<?php
    class Category
    {
        public function __construct(){}

        public function getAll()
        {
            include "../connection.php";
            $sql = "SELECT * FROM `category`";
            $result = $conn->query($sql);
            return $result;
        }

        public function add($cate)
        {
            include "../connection.php";
            $sql = "INSERT INTO `category` ". "(Name, Description) ". "VALUES('$cate->Name','$cate->Description')";
            echo $sql;
            $retval = $conn->query($sql);
            if(! $retval ) {
               return false;
             }
             return true;
        }
    }
?>
