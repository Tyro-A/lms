<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

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
                    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'active' : ''; ?>">
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
                            <li class="nav-item <?php echo $active_class; ?>">
                                <a class="nav-link" href="<?php echo SITEURL; ?>list-task.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name; ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/manage-list.php') ? 'active' : ''; ?>">
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
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>