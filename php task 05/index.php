<?php
session_start();
include_once "controller/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'partials/head.php'; ?>

<body>

    <?php include_once 'partials/nav.php'; ?>

    <div class="container">
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

        <?php if (isset($_SESSION['email'])): ?>
            <a href="add-info.php" class="btn btn-primary mb-3 mt-3">Add Info</a>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Phone</th>
                            <th scope="col">User Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $sql = "SELECT * FROM `information` ORDER BY `first_name` ASC";

                        $query = $conn->query($sql);

                        if ($query->num_rows > 0) {
                            while ($user = $query->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td scope="row"><?php echo $count++; ?></td>
                                    <td><?php echo $user['first_name']; ?></td>
                                    <td><?php echo $user['last_name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone_number']; ?></td>
                                    <td><?php echo $user['address']; ?></td>
                                    <td class="d-flex gap-3">
                                        <a href="edit-info.php?id=<?php echo $user['id']; ?>" class="btn btn-info">Edit</a>
                                        <form action="controller/info-controller.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                            <button name="delete" class="btn btn-danger" onclick="return confirm('Do you want to delete it?') ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once 'partials/footer.php'; ?>
</body>

</html>