<?php require_once('../../inc/header.php');
adminOnly();
$products = getProducts();
showMessage();
?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Products</h1>
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
                            <th>Product Name</th>
                            <th>Price Before Discount</th>
                            <th>Price After Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($products as $product):
                        ?>

                            <tr>

                                <td><?= $product['id'] ?></td>

                                <td class="fw-semibold">
                                    <?= $product['name'] ?>
                                </td>

                                <td>$<?= $product['oldPrice'] ?></td>

                                <td>$<?= $product['newPrice'] ?></td>


                                <td>

                                    
                                    <a href="../products/update_product.php?id=<?= $product['id'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Edit
                                    </a>
                                    <a href="../../handlers/products/delete_product.php?id=<?= $product['id'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <tr>


                            <td colspan="2" class="fw-bold">Number of Products</td>

                            <td colspan="2" class="text-success fw-bold">
                                <?= count($products); ?>
                            </td>

                            <td>
                                <a href="../products/create_product.php"
                                    class="btn btn-primary">
                                    Add Product
                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</section>

<?php require_once('../../inc/footer.php'); ?>