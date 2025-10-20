<?php
session_start();
include_once 'controller/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once 'partials/head.php';
?>

<body>
    <?php
    include_once 'partials/nav.php';
    ?>
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

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Please Login!</h4>
                        <!-- Login Form -->
                        <form action="controller/authcontroller.php" method="POST">
                            <!-- Email Field -->
                            <div class="form-group mb-3">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" required>
                            </div>
                            <!-- password field -->
                            <div class="form-group mb-3">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" autocomplete="off" required>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary">Login</button>

                            <p class="mt-5">Create a new one? <a href="register.php">Register Account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'partials/footer.php';
    ?>
</body>

</html>