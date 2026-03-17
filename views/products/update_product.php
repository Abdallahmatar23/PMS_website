<?php
require_once('../../inc/header.php');
adminOnly();
showMessage();
$product = getProductById($_GET['id']);
?>

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg">

                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Update Product</h4>
                </div>

                <div class="card-body">

                    <form action="../../handlers/products/update_product.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price Before Discount</label>
                            <input type="number" name="oldPrice" value="<?= $product['oldPrice'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price After Discount</label>
                            <input type="number" name="newPrice" value="<?= $product['newPrice'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="image" value="<?= $product['imagePath'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" value="<?= $product['description'] ?>" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg">
                                Update Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>