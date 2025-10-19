<!DOCTYPE html>
<html lang="en">
<?php
include_once 'partials/head.php';
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Create Your Account</h4>
                        <!-- Login Form -->
                        <form action="" method="POST">
                            <!-- Name field -->
                            <div class="form-group mb-3">
                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" autocomplete="off" required>
                            </div>
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
                            <!-- confirmed password -->
                            <div class="form-group mb-3">
                                <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-enter Your Password" autocapitalize="off" required>
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