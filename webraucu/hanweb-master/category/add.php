<?php
     session_start(); 
    require_once "../class/category.php";
    
    $cat = new stdClass();
    $cat->Name = $_POST["Name"];
    $cat->Description = $_POST["Description"];
    $category = new Category();
    $result = $category->add($cat);
    header("Location: index.php");
?>