<?php
class Order
{
    public function __construct()
    {
    }

    public function getAllOrder($cusID)
    {
        include "../connection.php";
        $sql = "SELECT * FROM `orders` WHERE `CustomerID` = '$cusID'";
        $result = $conn->query($sql);
        return $result;
    }

    public function getOrderDetail($orderid)
    {
        include "../connection.php";
        $sql = "SELECT * FROM orderdetail o inner join vegetable v on o.VegetableID = v.VegetableID WHERE `OrderID` = '$orderid'";
        $result = $conn->query($sql);
        return $result;
    }
    public function addOrder($order, $detail)
    {
        $today = date('Y-m-d H:i:s');
        include "../connection.php";
        $sql = "BEGIN; INSERT INTO `orders` " . "(CustomerID, Date, Total, Note) " . "VALUES('$order->CustomerID','$today','$order->Total', '$order->Note');
            INSERT INTO `orderdetail` (OrderID, VegetableID, Quantity, Price)  VALUES";
        foreach ($detail as $key => $value) {
            $sql .= "(LAST_INSERT_ID(), ". $value["VegetableID"] .",". $value["Quantity"] .", ". $value["Price"] .")";
            if($key + 1 < count($detail)){
                $sql .= ', ';
            }
        }
        $sql .= "; COMMIT;";
        $conn->multi_query($sql);
        return true;
    }
}
?>
