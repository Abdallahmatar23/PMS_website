<?php
include "../../core/config.php";
include "../../core/functions.php";


$operator = $_GET['operator'];
$id = $_GET['id'];

foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $id) {
        if ($operator == "decrement") {
            $item['quantity'] -= 1;
            } elseif ($operator == "increment") {
            $item['quantity'] += 1;
        }
    }
}
header("Location: ../../index.php");
exit;
