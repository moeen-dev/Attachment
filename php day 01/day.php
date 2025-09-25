<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Finder</title>
</head>

<body>

    <h2>Find Day Name by Number (1–7)</h2>

    <form method="POST" action="">
        <label>Enter a number (1–7):</label>
        <input type="text" name="dayNumber" required>
        <input type="submit" value="Find Day">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function getDayName($dayNumber)
        {
            switch ($dayNumber) {
                case 1:
                    return "Monday";
                case 2:
                    return "Tuesday";
                case 3:
                    return "Wednesday";
                case 4:
                    return "Thursday";
                case 5:
                    return "Friday";
                case 6:
                    return "Saturday";
                case 7:
                    return "Sunday";
                default:
                    return "Invalid day";
            }
        }

        $input = $_POST["dayNumber"];

        if (is_numeric($input)) {
            $dayName = getDayName((int)$input);
            echo "Your Input number is = $input and the day is $dayName.";
        } else {
            echo "<p>Please enter a valid number.</p>";
        }
    }
    ?>

</body>

</html>