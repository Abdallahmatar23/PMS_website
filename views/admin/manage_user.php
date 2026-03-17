<?php require_once('../../inc/header.php');
adminOnly();
$users = getUsers("user");
showMessage();
$counter = 0;
?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Users</h1>
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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($users as $user):
                        ?>

                            <tr>

                                <td><?= ++$counter?></td>

                                <td class="fw-semibold">
                                    <?= $user['name'] ?>
                                </td>

                                <td><?= $user['email'] ?></td>

                                <td><?= $user['address'] ?></td>
                                <td><?= $user['phone'] ?></td>


                                <td>


                                    <!-- <a href="../users/update_user.php?email=<? //= $user['email'] 
                                                                                ?>"
                                        class="btn btn-danger btn-sm">
                                        Edit
                                    </a> -->
                                    <a href="../../handlers/admin/delete_user.php?email=<?= $user['email'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <tr>


                            <td colspan="3" class="fw-bold">Number of Users</td>

                            <td colspan="2" class="text-success fw-bold">
                                <?= count($users); ?>
                            </td>

                            <td>
                                <a href="../auth/register.php"
                                    class="btn btn-primary">
                                    Add User
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