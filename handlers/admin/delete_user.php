<?php
include('../../core/config.php');
include('../../core/functions.php');

$email = $_GET['email'] ?? null;



if (deleteUser($email)) {
    setMessage("success", "User deleted successfully");
    header("Location:../../views/admin/manage_user.php");
    exit;
}
