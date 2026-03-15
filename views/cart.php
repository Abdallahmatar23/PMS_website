<?php require_once('../inc/header.php');
// require('../core/functions.php');
// include('../core/config.php');
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // echo "<pre>";
                        // var_dump($cartProducts);
                        // echo "</pre>";
                        if (isset($_SESSION['cart'])) {
                            $cartProducts = $_SESSION['cart'];
                        } else {
                            $cartProducts = [];
                        }
                        $total = 0;
                        foreach ($cartProducts as $product): ?>
                            <tr>
                                <th scope="row"><?= $product['id'] ?></th>
                                <td><?= $product['pName'] ?></td>
                                <td>$<?= $product['price'] ?></td>
                                <td>
                                    <input type="number" value="<?= $product['quantity'];?>">
                                    <!-- <button class="btn btn-sm btn-secondary minus" data-id="<?//= $product['id'] ?>">-</button>
                                    <input
                                        type="number"
                                        class="form-control text-center quantity"
                                        data-id="<?//= $product['id'] ?>"
                                        value="<?//= $product['quantity'] ?>"
                                        style="width:60px">
                                    <button class="btn btn-sm btn-secondary plus" data-id="<?//= $product['id'] ?>">+</button> -->
                                </td>
                                <td>$<?= $sum = ($product['price'] * $product['quantity']) ?></td>
                                <td>
                                    <a href="../handlers/cart/delete_item.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $total += $sum;
                        endforeach; ?>
                        <tr>
                            <td colspan="2">
                                <h3 align="center">Total Price</h3>

                            </td>
                            <td colspan="3">
                                <h3 align="center"><?= $_SESSION['totalCart'] = $total; ?>$</h3>
                            </td>
                            <td>
                                <a href="<?php if (isset($_SESSION['user'])) {
                                                echo "orders/checkout.php";
                                            } else {
                                                echo "auth/login.php";
                                            } ?>"
                                    class="btn btn-primary">Checkout</a>

                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>


<?php require_once('../inc/footer.php'); ?>