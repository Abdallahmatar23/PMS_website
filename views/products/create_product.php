<?php
require_once('../../inc/header.php');
showMessage();
?>

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg">

                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Create Product</h4>
                </div>

                <div class="card-body">

                    <form action="../../handlers/products/create_product.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price Before Discount</label>
                            <input type="number" name="oldPrice" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price After Discount</label>
                            <input type="number" name="newPrice" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg">
                                Create Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>