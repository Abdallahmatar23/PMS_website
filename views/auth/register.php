<?php
require_once('../../inc/header.php');
showMessage();
?>

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg border-0">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4 fw-bold">Create Account</h2>

                    <form action="../../handlers/auth/register_handler.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" name="name" type="text" placeholder="Enter your name..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email" type="email" placeholder="name@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control" name="address" type="text" placeholder="Enter your address..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input class="form-control" name="phone" type="tel" placeholder="+20 10 0000 0000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter your password..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input class="form-control" name="confirmPassword" type="password" placeholder="Confirm your password..." required>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg">
                                Register
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('../../inc/footer.php'); ?>