<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multidimensional Array</title>
</head>

<body>
    <?php
    $students = [
        ["name" => "Abdur Rahim", "age" => 19],
        ["name" => "Abdul Karim", "age" => 22],
        ["name" => "Abdus Selim", "age" => 25]
    ];

    foreach ($students as $student) {
        if ($student["age"] > 20) {
            echo "Name: " . $student["name"] . ", Age: " . $student["age"] . "<br>";
        }
    }
    ?>

</body>

</html>