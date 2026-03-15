<?php require_once('../inc/header.php'); ?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Shopping Cart</h1>
    </div>
</header>

<section class="py-5">

    <div class="container">

        <div class="card shadow">

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $cartProducts = $_SESSION['cart'] ?? [];
                        $total = 0;

                        foreach ($cartProducts as $product):

                            $sum = $product['price'] * $product['quantity'];
                            $total += $sum;
                        ?>

                            <tr>

                                <td><?= $product['id'] ?></td>

                                <td class="fw-semibold">
                                    <?= $product['pName'] ?>
                                </td>

                                <td>$<?= $product['price'] ?></td>

                                <td>
                                    <span class="badge bg-secondary">
                                        <?= $product['quantity'] ?>
                                    </span>
                                </td>

                                <td class="text-success fw-bold">
                                    $<?= $sum ?>
                                </td>

                                <td>

                                    <a href="../handlers/cart/delete_item.php?id=<?= $product['id'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <tr>

                            <td colspan="3"></td>

                            <td class="fw-bold">Total</td>

                            <td class="text-success fw-bold">
                                $<?= $_SESSION['totalCart'] = $total; ?>
                            </td>

                            <td>

                                <a href="<?php
                                            echo isset($_SESSION['user'])
                                                ? "orders/checkout.php"
                                                : "auth/login.php";
                                            ?>"

                                    class="btn btn-primary">

                                    Checkout

                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</section>

<?php require_once('../inc/footer.php'); ?>