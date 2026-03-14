<?php require_once('../../inc/header.php');
require('../../core/functions.php');
include('../../core/config.php');
// session_start();
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
<?php
$cartProducts = $_SESSION['cart'] ?? [];
// var_dump($cartProducts);
// foreach ($cartProducts as $product){
//     // echo  $product['id'] ,"</br>";
//     var_dump($product);
//     echo "</br>";
// }
// exit;
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php foreach ($cartProducts as $product): ?>
                                <li class="border p-2 my-1"> <?= $product['pName']; ?> -
                                    <span class="text-success mx-2 mr-auto bold"> <?= $product['quantity'] . " x " . $product['price'] ?>$</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <h3>Total : <?= $_SESSION['totalCart'] ?? 0; ?> $</h3>
                </div>
            </div>
            <div class="col-8">
                <form action="../../handlers/orders/create_order.php" method="POST" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" value="<?php echo $_SESSION['user']['address']; ?>" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="note" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('../../inc/footer.php'); ?>