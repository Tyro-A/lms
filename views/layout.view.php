<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.php");
    die();
}
if(isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to the login page
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Style for the user avatar */
        .user-avatar {
            position: relative; /* Added */
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        /* Style for the dropdown menu */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: calc(70% + 5px); /* Changed */
            left: -70px; /* Changed */
            background-color: #fff;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            color: black;
            background-color: #f1f1f1;
        }
    </style>
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
                    <li class="nav-item <?= ($_SERVER['PHP_SELF'] == '/manage-user.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="manage-user.php">Manage Users</a>
                    </li>
                </ul>
                <div class="dropdown ">
                    <div class="user-avatar">JD</div> <!-- Replace "JD" with user's initials -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="?logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="mb-5 pb-3">
        <?php require_once("$name.view.php"); ?>
    </div>
    

    <footer class="fixed-bottom p-3 bg-dark-subtle">
        <span class="text-muted">&copy; 2024 MN-Soft. All rights reserved.</span>
    </footer>

</body>

</html>