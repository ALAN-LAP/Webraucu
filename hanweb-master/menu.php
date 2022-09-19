<?php
session_start();
$baseurl = 'http://' . $_SERVER['SERVER_ADDR'] . '/hanweb/';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Market online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseurl . 'vegetable/index.php'; ?>">Vegetable</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseurl . 'cart/index.php'; ?>">Cart</a>
                </li>
                <?php if ($_SESSION['userid']) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseurl . 'cart/history.php'; ?>">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseurl . 'customer/logout.php'; ?>">Logout</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-secondary">Han Huynh</button>
                    </li>
                <?php endif; ?>
                <?php if (!$_SESSION['userid']) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $baseurl . 'customer/login.php'; ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>