<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGPA Scale</title>
</head>

<body>

    <h2>CGPA Scale</h2>
    <!-- Input from userr -->
    <form method="POSt" action="">
        <label>Enter your GPA (0.00 - 4.00):</label>
        <input type="text" name="gpa" required>
        <input type="submit" value="Get Grade">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function getGrade($gpa)
        {
            if (!is_numeric($gpa)) {
                return "Please enter a valid number.";
            }

            if ($gpa < 0 || $gpa > 4) {
                return "Error: GPA must be between 0.00 and 4.00.";
            }

            if ($gpa >= 3.60) {
                return "Your Grade is A+";
            } elseif ($gpa >= 3.20) {
                return "Your Grade is A";
            } elseif ($gpa >= 2.80) {
                return "Your Grade is B+";
            } elseif ($gpa >= 2.50) {
                return "Your Grade is B";
            } elseif ($gpa >= 2.00) {
                return "Your Grade is C";
            } elseif ($gpa >= 1.00) {
                return "Your Grade is D";
            } else {
                return "Your Grade is F";
            }
        }

        $inputGPA = $_POST["gpa"];
        $result = getGrade((float)$inputGPA);
        echo "Input is $inputGPA and $result";
    }
    ?>

</body>

</html>