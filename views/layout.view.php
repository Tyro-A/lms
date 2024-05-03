<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?= ($_SERVER['PHP_SELF'] == '/index.php') ? 'active' : ''; ?>">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php

                    // Your database connection and query
                    $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                    $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
                    $sql2 = "SELECT * FROM tbl_lists";
                    $res2 = mysqli_query($conn2, $sql2); // Assigning a value to $res2

                    if ($res2) { // Check if $res2 is valid
                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            $list_id = $row2['list_id'];
                            $list_name = $row2['list_name'];
                            $active_class = ($_SERVER['PHP_SELF'] == "/list-task.php?list_id=$list_id") ? 'active' : '';
                    ?>
                            <li class="nav-item <?= $active_class; ?>">
                                <a class="nav-link" href="<?= SITEURL; ?>list-task.php?list_id=<?= $list_id; ?>"><?= $list_name; ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li class="nav-item <?= ($_SERVER['PHP_SELF'] == '/manage-list.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="manage-list.php">Manage list</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="avatar.jpg" alt="Avatar" style="width: 32px; height: 32px; border-radius: 50%;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php require_once("$name.view.php"); ?>

    <footer class="fixed-bottom p-3 bg-dark-subtle">
        <span class="text-muted">&copy; 2024 MN-Soft. All rights reserved.</span>
    </footer>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>