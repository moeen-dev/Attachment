<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>

<body>

    <h2>Simple Calculator</h2>

    <form method="POST" action="">
        <label>Input Your Number:</label>
        <input type="text" name="num1" required>
        <br><br>

        <label>Input Your Number:</label>
        <input type="text" name="num2" required>
        <br><br>

        <label>Operator:</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function calculate($a, $b, $operator)
        {
            if (!is_numeric($a) || !is_numeric($b)) {
                echo "Please enter valid numbers!";
                return;
            }

            switch ($operator) {
                case '+':
                    $result = $a + $b;
                    echo "$a + $b = $result";
                    break;
                case '-':
                    $result = $a - $b;
                    echo "$a - $b = $result";
                    break;
                case '*':
                    $result = $a * $b;
                    echo "$a * $b = $result";
                    break;
                case '/':
                    if ($b == 0) {
                        echo "Division by zero is not allowed!";
                    } else {
                        $result = $a / $b;
                        echo "$a / $b = $result";
                    }
                    break;
                default:
                    echo "Invalid Operator, Please select corrects error!";
            }
        }

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];

        calculate($num1, $num2, $operator);
    }
    ?>

</body>

</html>