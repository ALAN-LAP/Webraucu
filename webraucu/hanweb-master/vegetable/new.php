<?php
session_start();
require_once "../class/category.php";
$categoryObj = new Category();
$category = $categoryObj->getAll();
?>
<html>

<head>
    <link rel="stylesheet" href="../css/boostrap.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php include '../menu.php'; ?>
    <div class="container">
        <div class="mt-3">
            <h3>Add vegetable</h3>
            <form action="add.php" enctype="multipart/form-data" method="post">
            <p class="text-danger"><?php echo $_SESSION['upload_error']?></p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="VegetableName">Vegetable Name</label>
                            <input required name="VegetableName" type="text" class="form-control" id="VegetableName" aria-describedby="VegetableName" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="CategoryID">Category Name</label>
                            <select class="form-control" name="CategoryID" id="CategoryID" required>
                                <option value="">None</option>
                                <?php
                                while ($cat  = $category->fetch_assoc()) {
                                    echo '<option value="' . $cat["CategoryID"] . '">' . $cat["Name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Unit">Unit</label>
                            <input required name="Unit" type="text" class="form-control" id="Unit" placeholder="Enter unit">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="description">Amount</label>
                            <input required name="Amount" type="number" class="form-control" id="Amount" placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input required name="Price" type="number" class="form-control" id="Price" placeholder="Enter price">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input required name="Image" type="file" class="form-control" id="Image" placeholder="Enter description">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</body>

</html>