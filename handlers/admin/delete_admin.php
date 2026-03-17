<?php
include('../../core/config.php');
include('../../core/functions.php');

$email = $_GET['email'] ?? null;



if (deleteUser($email)) {
    setMessage("success", "Admin deleted successfully");
    header("Location:../../views/admin/manage_admin.php");
    exit;
}
