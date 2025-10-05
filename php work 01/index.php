<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task 01</title>
</head>

<body>

    <form id="profileForm" action="" method="Post" enctype="multipart/form-data">
        <input type="file" name="profile_image" accept=".png,.jpg,.jpeg" required>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['profile_image'];
        $file_name = $file['name'];
        $file_tmpname = $file['tmp_name'];
        $file_size = $file['size'];

        $file_type = explode('.', $file_name);
        $file_extension = strtolower(end($file_type));

        $allowed_extensions = ['png', 'jpg', 'jpeg'];
        $max_size = 5 * 1024 * 1024;

        if (!in_array($file_extension, $allowed_extensions)) {
            die("Only png, jpg and jpeg allowed!");
        }

        if ($file_size > $max_size) {
            die("File size must be 5MB");
        }


        function randomWord($length = 3)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $word = '';
            for ($i = 0; $i < $length; $i++) {
                $word .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $word;
        }

        $random = randomWord();
        $date = date('Ymd');
        $new_file = "IMG-$random-$date.$file_extension";

        $upload_dir = "uploads/";
        $upload_path = $upload_dir . $new_file;



        if (move_uploaded_file($file_tmpname, $upload_path)) {
            echo "<p style='color: green;'>File uploaded successfully as: <b> $new_file</b> </p>";
        } else {
            echo "<p style='color: red;'>Upload Failed!</p>";
        }
    }

    // print_r($new_file);
    ?>

    <!-- <script>
        document.getElementById('profileForm').addEventListener("submit", function(e) {
            let form = this;

            form.querySelector("button[type='submit']").disabled = true;
        });
    </script> -->

</body>

</html>