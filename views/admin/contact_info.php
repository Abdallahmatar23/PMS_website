
<?php require_once('../../inc/header.php');

adminOnly();
$contacts =getContacts();
showMessage();
$counter = 0;
?>

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Contacts</h1>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($contacts as $contact):
                        ?>

                            <tr>

                                <td><?= $counter +=1?></td>

                                <td class="fw-semibold">
                                    <?= $contact['name'] ?>
                                </td>

                                <td><?= $contact['email'] ?></td>

                                <td><?= $contact['message'] ?></td>


                                <td>

                                    
                                    <!-- <a href="../contacts/update_contact.php?email=<? //= $contact['email'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Edit
                                    </a> -->
                                    <a href="../../handlers/contacts/delete_contact.php?email=<?= $contact['email'] ?>"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <tr>

                            <td colspan="4" class="fw-bold">Number of contacts</td>

                            <td colspan="1" class="text-success fw-bold">
                                <?= count($contacts); ?>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</section>

<?php require_once('../../inc/footer.php'); ?>