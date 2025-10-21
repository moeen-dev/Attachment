<?php
session_start();

$name = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]); // sanitize input
    $_SESSION['message'] = "Name '{$name}' added!";
    header("Location: index.php"); // redirect to avoid resubmission
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Toaster with Session</title>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <h2>Enter Your Name</h2>
    <form method="POST" action="">
        <input type="text" name="name" required>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($_SESSION['message'])): ?>
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "3000"
                };
                toastr.success("<?php echo $_SESSION['message']; ?>");
            });
        </script>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

</body>

</html>