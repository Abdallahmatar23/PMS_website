<?php require_once('../../inc/header.php');
// require('../../core/functions.php');
// include('../../core/config.php');

$orders = getOrderByEmail($_SESSION['user']['email']) ?? [];
// var_dump($orders);
// var_dump($orders["items"]);
// exit;

$counter = 1;
?>


<div class="container px-4 px-lg-5 mt-5">
    <div class="row">
        <div class="col-12">
            <?php foreach ($orders as $order):
                echo "<h2> Order $counter</h2>";
                $counter++;
            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (($order["items"] ?? []) as $item): ?>
                            <tr>
                                <td><?= $item['pName']; ?></td>
                                <td>$<?= $item['price'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>$<?= $item['price'] * $item['quantity'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">
                                <h3 align="center">Total Order Price</h3>
                            </td>
                            <td colspan="2">
                                <h3 align="center"><?= $order['total']; ?>$</h3>
                            </td>
                        </tr>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>