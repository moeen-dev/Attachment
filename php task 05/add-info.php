<?php

include_once 'controller/db.php';

?>


<!DOCTYPE html>
<html lang="en">

<?php include_once 'partials/head.php'; ?>

<body>

    <?php include_once 'partials/nav.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <form action="controller/info-controller.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="phone_number" id="phone_number" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" class="form-control" required autocomplete="off">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'partials/footer.php'; ?>
</body>

</html>