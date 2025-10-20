<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Info Crud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="./index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="./add-info.php" class="nav-link">Add Info</a>
                </li>
            </ul>
            <div class="d-flex gap-3">
                <?php if (isset($_SESSION['email'])): ?>
                    <a href="controller/logout.php" class="btn btn-success">Log Out</a>
                <?php endif; ?>
                <a href="./register.php" class="btn btn-primary">Register</a>
                <a href="./login.php" class="btn btn-success">Login</a>
            </div>
        </div>
    </div>
</nav>