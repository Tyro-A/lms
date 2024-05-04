<?php
require_once "config/app.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
    $role = $_POST["role"];

    $stmt = $conn->prepare("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $password, $role);
    if ($stmt->execute()) {

        $_SESSION['add'] = "User Added Successfully.";

        header('location:' . SITEURL);
    } else {

        $_SESSION['add_fail'] = "Failed to Add Task";

        header('location:' . SITEURL . 'add-task.php');
    }

    header("Location: manage-user.php");
    exit();
}
view("add-user");
