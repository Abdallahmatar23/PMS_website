<?php require_once('../inc/header.php'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <form action="../handlers/contacts/contact_handler.php" method="POST" class="card p-4 shadow">

            <h3 class="text-center mb-4">Contact Us</h3>

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= $_SESSION['user']['name'] ?? "" ?>">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?? "" ?>">
            </div>

            <div class="mb-3">
                <label>Message</label>
                <textarea name="message" class="form-control" rows="5"></textarea>
            </div>

            <button class="btn btn-dark w-100">Send</button>

        </form>

    </div>
</div>

<?php require_once('../inc/footer.php'); ?>