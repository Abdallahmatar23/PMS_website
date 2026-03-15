<?php

require_once "../../core/validations.php";
require_once "../../core/functions.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = sanitizeFields($_POST['name']);
    $email = sanitizeFields($_POST['email']);
    $address = sanitizeFields($_POST['address']);
    $phone = sanitizeFields($_POST['phone']);
    $password = sanitizeFields($_POST['password']);
    $confirmPassword = sanitizeFields($_POST['confirmPassword']);

    $emailExists = emailExists($email);
    $error = validateRegister($name, $email, $address, $phone, $password, $confirmPassword, $emailExists);

    if ($error !== true) {
        setMessage("danger", $error);
        header("Location: ../../views/auth/register.php");
        exit;
    }
    if (register($name, $email, $address, $phone, $password)) {
        setMessage("success", "You registered successfully");
        header("Location: ../../views/auth/login.php");
        exit;
    }
}
