<?php
require_once('../../inc/header.php');
include ("../../core/functions.php");
showMessage();
?>

<form action="../../handlers/auth/login_handler.php" method="POST" class="form border my-2 p-3">
    <div class="mb-3">
        <h1 class="fw-bolder">Login Form</h1>
        <div class="mb-3">
            <label for="">Email</label>
            <input class="form-control" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input class="form-control" name="password" type="password" placeholder="Enter your Password..." data-sb-validations="required,password" />
        </div>
        <!-- <div class="mb-3">
            <input class="form-control" name="id" type="numeric" hidden value="" data-sb-validations="required" />
        </div> -->
        <div class="mb-3">
            <input type="submit" value="Login" id="" class="btn btn-success">
        </div>
    </div>
</form>

<?php require_once('../../inc/footer.php'); ?>