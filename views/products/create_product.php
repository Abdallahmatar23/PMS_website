<?php
require_once('../../inc/header.php');
include "../../core/functions.php";
showMessage();
?>

<form action="../../handlers/products/create_product.php " method="POST" enctype="multipart/form-data" class="form border my-2 p-3">
    <div class="mb-3">
        <h1>Create Product</h1>
        <div class="mb-3">
            <label for="">Product Name</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Price Before Discount</label>
            <input type="number" name="oldPrice" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Price After Discount</label>
            <input type="number" name="newPrice" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Select Product Image</label>
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Description</label>
            <input type="text" name="description" id="" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Send" id="" class="btn btn-success">
        </div>
    </div>
</form>
<?php require_once('../../inc/footer.php'); ?>