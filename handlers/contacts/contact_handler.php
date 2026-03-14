<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = sanitizeFields($_POST['name']);
    $email = sanitizeFields($_POST['email']);
    $message = sanitizeFields($_POST['message']);

    $error = contactValidation($name, $email, $message);

    if ($error !== true) {
        setMessage("danger", $error);
        header('Location: ../../views/contact.php');
        exit;
    }
    if (saveContact($name, $email, $message)) {
        setMessage("success", "The contact info is added successfully we will call you soon");
        header('Location: ../../index.php');
        exit;
    }
}
