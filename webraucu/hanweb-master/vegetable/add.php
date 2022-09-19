<?php
     session_start(); 
    require_once "../class/vegetable.php";
    if(isset($_FILES["Image"])){
        $allowed = array('image/jpeg', 'image/png', 'image/jpg');
        $file_size = $_FILES['Image']['size'];
        if (!in_array($_FILES["Image"]["type"], $allowed)) {
            $_SESSION['upload_error'] = 'Vui long chon hinh co duoi jpeg, jpg hoac png';
        }
        else if($file_size > 2097152) {
            $_SESSION['upload_error'] = 'Hinh co kich thuoc qua 2MB. Vui long chon hinh nho hon';
        }
        
        else {
            $vet = new stdClass();
            $vet->VegetableName = $_POST["VegetableName"];
            $vet->CategoryID = $_POST["CategoryID"];
            $vet->Unit = $_POST["Unit"];
            $vet->Amount = $_POST["Amount"];
            $vet->Price = $_POST["Price"];
            $vet->Image = base64_encode(file_get_contents($_FILES["Image"]["tmp_name"]));
            $vegetable = new Vegetable();
            $result = $vegetable->add($vet);
            $_SESSION['upload_error'] = "";
        }
        header("Location: new.php");
    }
?>