<?php
require_once __DIR__ . '/../core/config.php';
require_once __DIR__ . '/../core/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Abdallah Shop</title>

    <link rel="icon" type="image/x-icon" href="<?= $base ?>/assets/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="<?= $base ?>/assets/css/styles.css" rel="stylesheet" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

        <div class="container">

            <a class="navbar-brand fw-bold" href="<?= $base ?>/index.php">
                <i class="bi bi-shop"></i> Abdallah Shop
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <span class="nav-link text-info">
                                <i class="bi bi-person-circle"></i>
                                <?= $_SESSION['user']['name']; ?>
                            </span>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= activeNavIcon("index.php") ?>"
                            href="<?= $base ?>/index.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= activeNavIcon("about.php") ?>"
                            href="<?= $base ?>/views/about.php">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= activeNavIcon("contact.php") ?>"
                            href="<?= $base ?>/views/contact.php">
                            Contact
                        </a>
                    </li>

                    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == "admin")): ?>

                        <li class="nav-item">
                            <a class="nav-link <?= activeNavIcon("create_product.php") ?>"
                                href="<?= $base ?>/views/products/create_product.php">
                                Add Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeNavIcon("add_admin.php") ?>"
                                href="<?= $base ?>/views/admin/add_admin.php">
                                Add Admin
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= activeNavIcon("orders.php") ?>"
                                href="<?= $base ?>/views/orders/orders.php">
                                Orders
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-danger"
                                href="<?= $base ?>/handlers/auth/logout.php">
                                Logout
                            </a>
                        </li>

                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link <?= activeNavIcon("register.php") ?>"
                                href="<?= $base ?>/views/auth/register.php">
                                Register
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= activeNavIcon("login.php") ?>"
                                href="<?= $base ?>/views/auth/login.php">
                                Login
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>

                <form class="d-flex" action="<?= $base ?>/views/cart.php">

                    <button class="btn btn-outline-light">

                        <i class="bi bi-cart-fill me-1"></i>

                        Cart

                        <span class="badge bg-danger ms-1 rounded-pill">

                            <?= getAllQuantity(); ?>

                        </span>

                    </button>

                </form>



            </div>
        </div>

    </nav>