<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practice Day 01</title>
</head>

<body>
    <!-- Add or Even check section -->
    <h2>Create function And check Odd or Even Number</h2>
    <form method="POST" action="">
        <label>Enter a number:</label>
        <input type="number" name="number" required>
        <input type="submit" value="Check">
    </form>

    <?php
    // Add or Even check PHP Code
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Add or Even check function
        function checkOddEven($num)
        {
            if ($num % 2 == 0) {
                echo "The $num is Even.";
            } else {
                echo "The $num is Odd.";
            }
        }

        $input = $_POST["number"];

        if (is_numeric($input)) {
            checkOddEven((int)$input); //Convert the input into integer
        } else {
            echo "Please Enter a Valid number.";
        }
    }

    ?>



</body>

</html>