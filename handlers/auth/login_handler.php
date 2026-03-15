<?php

require_once "../../core/validations.php";
require_once "../../core/functions.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = sanitizeFields($_POST['email']);
    $password = sanitizeFields($_POST['password']);

    $error = validateLogin( $email, $password);

    if($error !== true){
        setMessage("danger" , $error);
        header("Location: ../../views/auth/login.php");
        exit;
    }
    if(login( $email, $password)){
        setMessage("success" , "You login successfully");
        header("Location: ../../index.php");
        exit;
    }else{
        setMessage("danger" ,  "Invalid email or password");
        header("Location: ../../views/auth/login.php");
        exit;
    }
}