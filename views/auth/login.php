<?php
require_once('../../inc/header.php');
showMessage();
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-4">

            <form action="../../handlers/auth/login_handler.php"
                method="POST"
                class="card shadow border-0 p-4">

                <h3 class="text-center mb-4 fw-bold">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </h3>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">

                        <option value="user">User</option>
                        <option value="admin">Admin</option>

                    </select>
                </div>

                <button class="btn btn-dark w-100">
                    <i class="bi bi-door-open"></i>
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

<?php require_once('../../inc/footer.php'); ?>