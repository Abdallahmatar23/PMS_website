<?php

require_once "../../core/validations.php";
require_once "../../core/functions.php";

// var_dump($_POST['role']);
// exit;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = sanitizeFields($_POST['email']);
    $password = sanitizeFields($_POST['password']);
    $role = sanitizeFields(strtolower($_POST['role']));

    $error = validateLogin($email, $password, $role);

    if ($error !== true) {
        setMessage("danger", $error);
        header("Location: ../../views/auth/login.php");
        exit;
    }
    if (!$role) {
        setMessage("danger", "Role not valid");;
        header("Location: ../../views/auth/login.php");
        exit;
    }
    if (login($email, $password, $role)) {
        setMessage("success", "You login successfully");
        header("Location: ../../index.php");
        exit;
    } else {
        setMessage("danger",  "Invalid email or password or role");
        header("Location: ../../views/auth/login.php");
        exit;
    }
}
