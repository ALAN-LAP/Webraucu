<?php
session_start();
require_once "../class/category.php";
require_once "../class/vegetable.php";
$categoryObj = new Category();
$vegetableObj = new Vegetable();
$category = $categoryObj->getAll();
if (!$_POST['cat']) {
    $vegetable = $vegetableObj->getAll();
} else if (($_POST['cat'] && count($_POST['cat']) == 1)) {
    $vegetable = $vegetableObj->getListByCateID($_POST['cat'][0]);
} else if (($_POST['cat'] && count($_POST['cat']) > 1)) {
    $vegetable = $vegetableObj->getListByCateIDs($_POST['cat']);
}
function isOutOfStock($id, $quantity) {
    foreach ($_SESSION["cart"] as $key => $item) {
        if($item["VegetableID"] == $id && $item["Quantity"] == $quantity){
            return true;
        }
    }
    return false;
}
?>
<html>

<head>
    <link rel="stylesheet" href="../css/boostrap.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php include '../menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="filter col-md-3">
                <h3>Category Name:</h3>
                <form name="filter" action="" method="post">
                    <?php
                    while ($cat  = $category->fetch_assoc()) {
                        echo '<div class="form-check">
                                <input name="cat[]" value="' . $cat["CategoryID"] . '" class="form-check-input" type="checkbox" value="" id="' . $cat["CategoryID"] . '">
                                <label class="form-check-label" for="' . $cat["CategoryID"] . '">
                                    ' . $cat["Name"] . '
                                </label>
                            </div>';
                    }
                    ?>
                    <button type="submit" class="btn btn-primary filter-btn">Filter</button>
                </form>
            </div>
            <div class="product col-md-9">
                <ul class="product-list row">
                    <?php
                    while ($vet  = $vegetable->fetch_assoc()) {
                        echo '<li class="product-item col-md-3">
                        <form method="post" action="../cart/index.php?action=buy&id=' . $vet["VegetableID"] . '">
                                <img class="product-image" src="data:image/jpeg;base64,' . $vet["Image"] . '"/>
                                <p class="product-name">' . $vet["VegetableName"] . ' <span class="badge badge-warning">' . number_format($vet["Price"]) . ' / '. $vet['Unit'] .'</span></p>';
                        if (isOutOfStock($vet["VegetableID"], $vet["Amount"])) {
                            echo '<button type="submit" name="buy" class="disabled btn btn-secondary">Out of Stock</button>';
                        } else {
                            echo '<button type="submit" name="buy" class="btn btn-danger">Buy</button>';
                        }
                        echo '<input type="hidden" name="hidden_name" value="' . $vet["VegetableName"] . '">
                                <input type="hidden" name="hidden_price" value="' . $vet["Price"] . '">
                                <input type="hidden" name="hidden_unit" value="' . $vet["Unit"] . '">
                                <input type="hidden" name="hidden_image" value="' . $vet["Image"] . '">
                                </form>
                            </li>';
                    }
                    if ($vegetable->num_rows == 0) {
                        echo 'Khong tim thay ket qua';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>