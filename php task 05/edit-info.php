<?php
session_start();
include_once 'controller/db.php';

?>


<!DOCTYPE html>
<html lang="en">

<?php include_once 'partials/head.php'; ?>

<body>

    <?php include_once 'partials/nav.php'; ?>

    <div class="container mt-5">
        <?php
        // Error message
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            unset($_SESSION['errors']);
        }

        // Success message
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
        }
        ?>
        <div class="row">
            <div class="col-lg-12">

                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM information WHERE id = $id";
                    $query = $conn->query($sql);

                    if ($query->num_rows > 0) {
                        while ($user = $query->fetch_assoc()) {
                ?>
                            <form action="controller/info-controller.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <div class="form-group mb-3">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" required autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" required autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" required autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" value="<?php echo $user['phone_number']; ?>" required autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $user['address']; ?>" required autocomplete="off">
                                </div>

                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                <?php
                        }
                    }
                } else {
                    echo "No Data Found!";
                }
                ?>

            </div>
        </div>
    </div>

    <?php include_once 'partials/footer.php'; ?>
</body>

</html>