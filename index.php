<?php
include_once('inc/header.php');
require('core/functions.php');

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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $products = getProducts();
            foreach ($products as $product): ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="<?= $product['imagePath'] ?>" alt="<?= $product['name'] ?>" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $product['name'] ?></h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$<?= $product['oldPrice'] ?></span>
                                $<?= $product['newPrice'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="mb-3">
                                <label for="quantity" class="form-label small fw-bold text-muted">Quantity in cart</label>
                                <input type="number"
                                    class="form-control text-center mx-auto"
                                    id="quantity"
                                    style="max-width: 100px;"
                                    value="<?php echo ($_SESSION['cartItemQuantity']['id'] == $product['id']) ? $_SESSION['cartItemQuantity']['quantity'] : 0; ?>"
                                    min="1">
                            </div>

                            <div class="text-center">
                                <a class="btn btn-dark mt-auto w-100" href="handlers/cart/add_item.php?id=<?= $product['id'] ?>">
                                    <i class="bi bi-cart-plus"></i> Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>


<?php

//old add to cart

/*
"<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
    <label for="quantity"> in cart</label>
    <input type="number" id="quantity" value="<?php echo ($_SESSION['cartItemQuantity']['id'] == $product['id']) ? $_SESSION['cartItemQuantity']['quantity'] : 0; ?>">
    </br>
    </br>
    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="handlers/cart/add_item.php?id=<?= $product['id'] ?>">Add to cart</a></div>
</div>"
*/
