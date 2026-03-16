<?php
require_once('../../inc/header.php');

if ($_SESSION['user']['role'] == "user") {
    $orders = getOrderByEmail($_SESSION['user']['email']) ?? [];
} else {
    $orders = getAllOrder() ?? [];
}

$counter = 1;
?>

<div class="container py-5">

    <h2 class="mb-4 text-center fw-bold">My Orders</h2>

    <div class="row">
        <div class="col-12">

            <?php foreach ($orders as $order): ?>

                <div class="card shadow-sm mb-4">

                    <div class="card-header bg-dark text-white d-flex justify-content-between">
                        <h5 class="mb-0">Order #<?= $counter ?></h5>
                        <span>Total: $<?= $order['total'] ?></span>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach (($order["items"] ?? []) as $item): ?>

                                    <tr>

                                        <td class="fw-semibold">
                                            <?= $item['pName']; ?>
                                        </td>

                                        <td>
                                            $<?= $item['price'] ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-secondary">
                                                <?= $item['quantity'] ?>
                                            </span>
                                        </td>

                                        <td class="text-success fw-bold">
                                            $<?= $item['price'] * $item['quantity'] ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <div class="card-footer text-end">

                        <h5 class="text-success mb-0">
                            Total Order Price: $<?= $order['total']; ?>
                        </h5>

                    </div>

                </div>

            <?php
                $counter++;
            endforeach;
            ?>

        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>