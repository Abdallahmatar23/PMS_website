<?php
include('../../core/config.php');
include('../../core/functions.php');

$id = $_GET['id'] ?? null;



if (deleteProduct($id)) {
    setMessage("success", "Product deleted successfully");
    header("Location:../../views/admin/products.php");
    exit;
}
