<?php require_once('../../inc/header.php');
adminOnly();
$admins = getUsers("admin");
// var_dump($admins);
// exit;
$counter = 0;
showMessage();
?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Admins</h1>
    </div>
</header>

<section class="py-5">

    <div class="container">

        <div class="card shadow">

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Admin Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($admins as $key => $admin):
                        ?>

                            <tr>

                                <td><?= $counter += 1  ?></td>

                                <td class="fw-semibold">
                                    <?= $admin['name'] ?>
                                </td>

                                <td><?= $admin['email'] ?></td>

                                <td><?= $admin['address'] ?></td>
                                <td><?= $admin['phone'] ?></td>


                                <td>


                                    <!-- <a href="../admins/update_admin.php?email=<? //= $admin['email'] 
                                                                                    ?>"
                                        class="btn btn-danger btn-sm">
                                        Edit
                                    </a> -->
                                    <a href="../../handlers/admin/delete_admin.php?email=<?= $admin['email'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <tr>


                            <td colspan="3" class="fw-bold">Number of Admins</td>

                            <td colspan="2" class="text-success fw-bold">
                                <?= count($admins); ?>
                            </td>

                            <td >
                                <a href="../admin/add_admin.php"
                                    class="btn btn-primary">
                                    Add Admin
                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</section>

<?php require_once('../../inc/footer.php'); ?>