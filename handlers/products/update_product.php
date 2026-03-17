<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = sanitizeFields($_POST['name']);
    $oldPrice = sanitizeFields($_POST['oldPrice']);
    $newPrice = sanitizeFields($_POST['newPrice']);
    $description = sanitizeFields($_POST['description']);
    $id = sanitizeFields($_POST['id']);

    $imageName = time() . "_" . $_FILES['image']['name'];
    // او
    // $imageName = uniqid() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $tmpName = $_FILES['image']['tmp_name'];

    $uploadPath = __DIR__ . "/../../public/uploads/" . $imageName;
    move_uploaded_file($tmpName, $uploadPath);

    $imagePath = str_replace("\\", "/", "public/uploads/" . $imageName);
    // $imagePath = "public/uploads/" . str_replace("\/", "/", $imageName);
    $imageType = $_FILES['image']['type'];

    $error = validateProduct($name, $oldPrice, $newPrice, $imagePath, $description, $imageType);

    if ($error !== true) {
        setMessage("danger", $error);
        header("Location: ../../views/admin/products.php");
        exit;
    }
    if (editProduct($id,$name, $oldPrice, $newPrice, $imagePath, $description)) {
        setMessage("success", "Product updated successfully");
        header("Location: ../../views/admin/products.php");
        exit;
    }
}
