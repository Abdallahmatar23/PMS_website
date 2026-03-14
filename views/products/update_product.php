<form action= " <?php __DIR__ . "/../../handlers/products/update_product.php"?> " method = "POST" enctype="multipart/form-data" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Price Before Discount</label>
                            <input type="number" name="old_price" value="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Price After Discount</label>
                            <input type="number" name="dis_price" value="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Select Product Image</label>
                            <input type="file" name="image" id="" value="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>