<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="../css/boostrap.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php include '../menu.php'; ?>
    <?php 
        if(($_SESSION['userid'])) {
            header("Location: ../index.php");
        }
    ?>
    <div class="container">
        <form method="post" action="saveRegister.php">
        <h2>Register</h2>
        <p class="text-danger"><?php echo $_SESSION['register_error']?></p>
        <div class="form-group">
                <label>Your's Fullname:</label>
                <input required name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter fullname">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input required name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input name="address" type="text" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
                <label>City:</label>
                <input name="city" type="text" class="form-control" placeholder="City">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>