<?php

function validateRequire($value, $fieldName)
{
    return empty($value) ? "$fieldName Is Required" : null;
}

function validateEmail($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Please Enter Valid Email";
}

function validatePhone($phone)
{
    $pattern = "/^(\\+20|0)1[0-5][0-9]{8}$/";
    return (preg_match($pattern, $phone)) ? null : "Please Enter Valid Phone Number";
}

function validateAddress($address)
{
    if (strlen($address) <= 5) {
        return "Address must be more than 5 chars";
    } elseif (strlen($address) >= 50) {
        return "Address must be less than 50 chars";
    } else {
        return null;
    }
}

function validatePassword($password)
{
    if (strlen($password) < 6) {
        return "Address must be more than 5 chars";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).+$/", $password)) {
        return "Password must have lowercase, uppercase, number and special char ";
    }
    return null;
}

function validateConfirmPassword($password, $confirmPassword)
{
    return ($password === $confirmPassword) ? null : "Password not matched";
}

function validatePrice($price)
{
    return preg_match('/^\d+(\.\d{2})?$/', $price) ? null : "Enter Valid price";
}
function validateImage($imageType)
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    return (!in_array($imageType, $allowedTypes)) ? "Only JPG PNG allowed" : null;
}

function validateDescription($description)
{
    if (strlen($description) <= 5) {
        return "Description must be more than 5 chars";
    } elseif (strlen($description) >= 100) {
        return "Description must be less than 100 chars";
    } else {
        return null;
    }
}

function validateMessage($message)
{
    return (strlen($message) > 5 && strlen($message) < 500) ? null : "Message Must Be Between 5 And 500 chars";
}

function sanitizeFields($field)
{
    $field = trim($field);
    $field = htmlspecialchars($field);
    return $field;
}

function validateRole($role)
{
    $allowedRoles = ['admin', 'user'];
    return (!in_array($role, $allowedRoles)) ? "the Role must be admin or user" : true;
}


function validateRegister($name, $email, $address, $phone, $password, $confirmPassword, $emailExists)
{
    $fields = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'password' => $password,
        'confirmPassword' => $confirmPassword
    ];

    foreach ($fields as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }

    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($emailExists) {
        return "The Email Already Exist";
    }
    if ($error = validateAddress($address)) {
        return $error;
    }
    if ($error = validatePhone($phone)) {
        return $error;
    }
    if ($error = validatePassword($password)) {
        return $error;
    }
    if ($error = validateConfirmPassword($password, $confirmPassword)) {
        return $error;
    }
    return true;
}
function validateAdmin($name, $email, $address, $phone, $password, $confirmPassword, $role, $emailExists)
{
    $fields = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'password' => $password,
        'confirmPassword' => $confirmPassword,
        'role' => $role
    ];

    foreach ($fields as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }

    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($emailExists) {
        return "The Email Already Exist";
    }
    if ($error = validateAddress($address)) {
        return $error;
    }
    if ($error = validatePhone($phone)) {
        return $error;
    }
    if ($error = validatePassword($password)) {
        return $error;
    }
    if ($error = validateConfirmPassword($password, $confirmPassword)) {
        return $error;
    }
    return true;
}
function validateLogin($email, $password, $role)
{
    $fields = [

        'email' => $email,
        'password' => $password,
        'role' => $role
    ];

    foreach ($fields as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }
    if ($error = validateRole($role)) {
        return $error;
    }
    return true;
}

function validateProduct($name, $oldPrice, $newPrice, $uploadPath, $description, $imageType)
{
    $products = [
        'name' => $name,
        'oldPrice' => $oldPrice,
        'newPrice' => $newPrice,
        'uploadPath' => $uploadPath,
        'description' => $description
    ];

    foreach ($products as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }

    if ($error = validatePrice($oldPrice)) {
        return $error;
    }
    if ($error = validatePrice($newPrice)) {
        return $error;
    }
    if ($error = validateImage($imageType)) {
        return $error;
    }
    if ($error = validateDescription($description)) {
        return $error;
    }
    return true;
}


function validateOrder($name, $email, $address, $phone, $note)
{
    $fields = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'note' => $note
    ];

    foreach ($fields as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }

    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($error = validateAddress($address)) {
        return $error;
    }
    if ($error = validatePhone($phone)) {
        return $error;
    }
    if ($error = validateDescription($note)) {
        return $error;
    }
    return true;
}


function contactValidation($name, $email, $message)
{
    $fields = [
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];

    foreach ($fields as $key => $val) {
        if ($error = validateRequire($val, $key)) {
            return $error;
        }
    }

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validateMessage($message)) {
        return $error;
    }

    return true;
}
