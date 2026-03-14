<?php
require('../../core/functions.php');
include('../../core/config.php');

$id = $_GET['id'];
$quantity = 1;

$product = getProductById($id);

$name = $product["name"];
$price = $product["newPrice"];

addToCard($id, $name, $quantity, $price);

header("Location: ../../index.php");

// $quantity = $_SESSION['cart']['quantity'];
// $ids = array_column($_SESSION['cart'], 'id');

// if (in_array($id, $ids)) {
//     $quantity += 1;
// } else {
//     $quantity = 1;
// }



// $ids = array_column($_SESSION['cart'], 'id');
// var_dump($ids);
// var_dump($_SESSION['cart']);
// var_dump($_SESSION['cart']['quantity']);







    
    // var_dump($product);
// array(6) { ["id"]=> int(3) ["name"]=> string(12) "Kevin Bolton" ["oldPrice"]=> string(3) "920" ["newPrice"]=> string(3) "443" 
// ["imagePath"]=> string(37) "public/uploads/1773355411_1329768.png" ["description"]=> string(17) "Macaulay Galloway" }


// echo $id;