<?php

include('../../core/config.php');

$id = $_POST['id'];
$quantity = $_POST['quantity'];

foreach ($_SESSION['cart'] as &$item){

    if($item['id'] == $id){
        $item['quantity'] = $quantity;
        break;
    }
}

echo "updated";