
<?php
require_once __DIR__ . '/../core/config.php';
// session_start();
// $base = "http://localhost/eraasoft/tasks/pmsProject";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - EraaSoft PMS Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= $base . "/assets/favicon.ico" ?> " />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= $base . "/assets/css/styles.css" ?> " rel="stylesheet" />
</head>


<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?= $base . "/index.php" ?>">Abdallah PMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= $base . "/index.php" ?> ">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/about.php" ?> ">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/contact.php" ?> ">Contact</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/products/create_product.php" ?>">Add Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/orders/orders.php" ?> ">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $base . "/handlers/auth/logout.php" ?>">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/auth/register.php" ?>">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $base . "/views/auth/login.php" ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
                <form class="d-flex" action="<?= $base . "/views/cart.php" ?> ">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php  
                        if(isset($_SESSION['cart'])){
                            echo array_sum(array_column($_SESSION['cart'], 'quantity')); 
                        }else{echo 0;}?>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </nav>