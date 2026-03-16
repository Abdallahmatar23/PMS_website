<?php
require_once('../../inc/header.php');
showMessage();
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">Add New Admin</h4>
                </div>

                <div class="card-body p-4">

                    <form action="../../handlers/admin/add_admin_handler.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input class="form-control" name="name" type="text" placeholder="Enter admin name..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input class="form-control" name="email" type="email" placeholder="admin@email.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>
                                <input class="form-control" name="address" type="text" placeholder="Enter address..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input class="form-control" name="phone" type="tel" placeholder="+20 10 0000 0000" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input class="form-control" name="password" type="password" placeholder="Enter password..." required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input class="form-control" name="confirmPassword" type="password" placeholder="Confirm password..." required>
                            </div>
                        </div>

                        <input type="hidden" name="role" value="admin">

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg">
                                <i class="bi bi-person-plus"></i>
                                Add Admin
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once('../../inc/footer.php'); ?>