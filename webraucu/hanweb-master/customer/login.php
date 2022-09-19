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
        <form method="post" action="checkLogin.php">
        <h2>Login</h2>
        <p class="text-danger"><?php echo $_SESSION['login_error']?></p>
            <div class="form-group">
                <label for="exampleInputEmail1">Your's ID</label>
                <input required name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter id">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-primary">Register</a>
        </form>
    </div>
</body>
</html>