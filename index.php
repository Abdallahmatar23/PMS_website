<?php
require_once('inc/header.php');
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Welcome to My Shop</h1>
        <p class="lead text-white-50">Best products with best prices</p>
    </div>
</header>

<!-- Products Section -->
<section class="py-5">
    <div class="container">

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
            $products = getProducts();

            foreach ($products as $product):
            ?>

                <div class="col mb-5">
                    <div class="card h-100 shadow-sm">

                        <!-- Sale badge -->
                        <div class="badge bg-danger text-white position-absolute"
                            style="top:10px; right:10px;">
                            Sale
                        </div>

                        <!-- Product Image -->
                        <img class="card-img-top"
                            src="<?= $product['imagePath'] ?>"
                            alt="<?= $product['name'] ?>"
                            style="height:200px; object-fit:cover;">

                        <!-- Product Details -->
                        <div class="card-body text-center">

                            <h5 class="fw-bold">
                                <?= $product['name'] ?>
                            </h5>

                            <p class="text-muted">
                                <del>$<?= $product['oldPrice'] ?></del>
                            </p>

                            <h5 class="text-success">
                                $<?= $product['newPrice'] ?>
                            </h5>

                        </div>

                        <!-- Product Actions -->
                        <div class="card-footer bg-transparent text-center">

                            <?php if (!getQuantityById($product['id'])): ?>

                                <a class="btn btn-dark w-100"
                                    href="handlers/cart/add_item.php?id=<?= $product['id'] ?>">
                                    Add To Cart
                                </a>

                            <?php else: ?>

                                <div class="d-flex justify-content-center gap-2">

                                    <a class="btn btn-danger"
                                        href="handlers/cart/counter.php?id=<?= $product['id'] ?>&operator=decrement">
                                        -
                                    </a>

                                    <span class="align-self-center">
                                        <?= getQuantityById($product['id']); ?>
                                    </span>

                                    <a class="btn btn-success"
                                        href="handlers/cart/counter.php?id=<?= $product['id'] ?>&operator=increment">
                                        +
                                    </a>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>