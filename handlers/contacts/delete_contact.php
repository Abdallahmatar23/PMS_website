<?php
include('../../core/config.php');
include('../../core/functions.php');

$email = $_GET['email'] ?? null;



if (deleteContact($email)) {
    setMessage("success", "Contact deleted successfully");
    header("Location:../../views/admin/contact_info.php");
    exit;
}
