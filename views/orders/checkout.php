<?php require_once('../../inc/header.php'); ?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bolder">Checkout</h1>
        <p class="lead text-white-50">Complete your order</p>
    </div>
</header>

<?php
$cartProducts = $_SESSION['cart'] ?? [];
?>

<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <!-- Cart Summary -->
            <div class="col-md-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Your Cart</h5>
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">

                            <?php foreach ($cartProducts as $product): ?>

                                <li class="list-group-item d-flex justify-content-between align-items-center">

                                    <span><?= $product['pName']; ?></span>

                                    <span class="text-success fw-bold">
                                        <?= $product['quantity'] ?> x $<?= $product['price'] ?>
                                    </span>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                        <hr>

                        <h5 class="text-end">
                            Total :
                            <span class="text-success">
                                $<?= $_SESSION['totalCart'] ?? 0; ?>
                            </span>
                        </h5>

                    </div>
                </div>

            </div>

            <!-- Checkout Form -->
            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Shipping Information</h5>
                    </div>

                    <div class="card-body">

                        <form action="../../handlers/orders/create_order.php" method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"
                                        value="<?= $_SESSION['user']['name']; ?>"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        value="<?= $_SESSION['user']['email']; ?>"
                                        class="form-control">
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address"
                                    value="<?= $_SESSION['user']['address']; ?>"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone"
                                    value="<?= $_SESSION['user']['phone']; ?>"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea name="note" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-success btn-lg">
                                    Place Order
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php require_once('../../inc/footer.php'); ?>