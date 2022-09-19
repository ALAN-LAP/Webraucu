<?php
    class Vegetable
    {
        public function __construct(){}

        public function getAll()
        {
            include "../connection.php";
            $sql = "SELECT * FROM `vegetable`";
            $result = $conn->query($sql);
            return $result;
        }

        public function getByID($id)
        {
            include "../connection.php";
            $sql = "SELECT * FROM `vegetable` WHERE `VegetableID` = '$id'";
            $result = $conn->query($sql);
            return $result;
        }
        public function getListByCateID($cateid)
        {
            include "../connection.php";
            $sql = "SELECT * FROM `vegetable` WHERE `CateGoryId` = '$cateid'";
            $result = $conn->query($sql, 0);
            return $result;
        }
        public function getListByCateIDs($cateids)
        {
            include "../connection.php";
            $whereIn = implode('","', $cateids);
            $sql = 'SELECT * FROM vegetable WHERE CateGoryId IN ("'.$whereIn.'")';
            $result = $conn->query($sql);
            return $result;
        }
        public function add($vet)
        {
            include "../connection.php";
            $sql = "INSERT INTO `vegetable` ". "(`CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) ". 
            "VALUES('$vet->CategoryID', '$vet->VegetableName', '$vet->Unit', '$vet->Amount', '$vet->Image', '$vet->Price')";
            $retval = $conn->query($sql);
            if(! $retval ) {
               return false;
             }
             return true;
        }
    }
?>
