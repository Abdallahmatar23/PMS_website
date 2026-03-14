<?php
include('../../core/config.php');
$id = $_GET['id'];

foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $id) {
        unset($_SESSION['cart'][$key]);
        break;
    }
}

// session_unset();

header("Location:../../views/cart.php");
exit;