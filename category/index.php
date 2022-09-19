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
        <div class="row mt-3">
            <div class="col-md-3">
                <h3>Add category</h3>
                <form method="post" action="add.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required name="Name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="Description" type="text" class="form-control" id="description" placeholder="Enter description">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="col-md-9">
                <table class="cart">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    <?php
                    $count = 0;
                    while ($cat  = $category->fetch_assoc()) {
                        $count++;
                        echo '<tr>
                    <td>' . $count . '</td>
                    <td>' . $cat["Name"] . '</td>
                    <td>' . ($cat["Description"]) . '</td>
                </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>