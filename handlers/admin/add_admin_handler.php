<?php
require_once "../../core/validations.php";
require_once "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeFields($_POST['name']);
    $email = sanitizeFields($_POST['email']);
    $address = sanitizeFields($_POST['address']);
    $phone = sanitizeFields($_POST['phone']);
    $password = sanitizeFields($_POST['password']);
    $confirmPassword = sanitizeFields($_POST['confirmPassword']);
    $role = sanitizeFields(strtolower($_POST['role']));


    $emailExists = emailExists($email);
    $error = validateAdmin($name, $email, $address, $phone, $password, $confirmPassword,$role, $emailExists);

    if ($error !== true) {
        setMessage("danger", $error);
        header("Location: ../../views/admin/add_admin.php");
        exit;
    }
    if (addAdmin($name, $email, $address, $phone, $password)) {
        setMessage("success", "Admin added successfully");
        header("Location: ../../index.php");
        exit;
    }
}
