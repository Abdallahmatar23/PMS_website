<?php
require_once('../../inc/header.php');
include "../../core/functions.php";
showMessage();
?>
<form action="../../handlers/auth/register_handler.php" method="POST" class="form border my-2 p-3">
    <div class="mb-3">
        <h1 class="fw-bolder">Register Form</h1>
        <!-- <div class="mb-3">
                            <input class="form-control" name="id" type="numeric" data-sb-validations="required" hidden />
                        </div> -->
        <div class="mb-3">
            <label for="">Name</label>
            <input class="form-control" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input class="form-control" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
        </div>
        <div class="mb-3">
            <label for="">Address</label>
            <input class="form-control" name="address" type="text" placeholder="Enter your Address..." data-sb-validations="required" />
        </div>
        <div class="mb-3">
            <label for="">Phone</label>
            <input class="form-control" name="phone" type="tel" placeholder="(\\+20|0)1[0-5][0-9]{8}" data-sb-validations="required" />
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input class="form-control" name="password" type="password" placeholder="Enter your Password..." data-sb-validations="required,password" />
        </div>
        <div class="mb-3">
            <label for="">Confirm Password</label>
            <input class="form-control" name="confirmPassword" type="password" placeholder="Enter your Password Again..." data-sb-validations="required,password" />
        </div>
        <div class="mb-3">
            <input type="submit" value="Register" id="" class="btn btn-success">
        </div>
    </div>
</form>

<?php require_once('../../inc/footer.php'); ?>