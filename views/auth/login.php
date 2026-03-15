<?php
require_once('../../inc/header.php');
// include ("../../core/functions.php");
showMessage();
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <form action="../../handlers/auth/login_handler.php" method="POST" class="card p-4 shadow">

            <h3 class="text-center mb-4">Login</h3>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn btn-dark w-100">
                Login
            </button>

        </form>

    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>