<?php

// $file = __DIR__ . "/../../data/orders.json";


require "../../core/validations.php";
require "../../core/functions.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = sanitizeFields($_POST['name']);
    $email = sanitizeFields($_POST['email']);
    $address = sanitizeFields($_POST['address']);
    $phone = sanitizeFields($_POST['phone']);
    $note = sanitizeFields($_POST['note']);



    $error = validateOrder($name, $email, $address, $phone, $note);

    if($error !== true){
        setMessage("danger" , $error);
        header("Location: ../../views/orders/checkout.php");
        exit;
    }
    if(createOrder($name, $email, $address, $phone, $note)){
        setMessage("success" , "Order created successfully");
        unset($_SESSION['cart']);
        unset($_SESSION['totalCart']);

        header("Location: ../../index.php");
        exit;
    }
}