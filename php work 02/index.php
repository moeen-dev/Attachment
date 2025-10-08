<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f7f9fc;
        }

        .form-container {
            max-width: 450px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-msg {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h4 class="text-center mb-4">Registration Form</h4>

        <form action="">
            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Enter Your Name Here <span class="text-danger">*</span></label>
                <input type="name" name="name" id="name" class="form-control">
                <small class="error-msg" id="name"></small>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label"></label>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>