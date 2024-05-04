<?php
require_once "../task-manager/config/constants.php";
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection


    // Collect form data
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
    $role = $_POST["role"];

    // Prepare and execute SQL statement to insert user into database
    $stmt = $conn->prepare("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $password, $role);
    if ($stmt->execute()) {
        //Query Executed and Task Inserted Successfully
        $_SESSION['add'] = "User Added Successfully.";

        //Redirect to Homepage
        header('location:' . SITEURL);
    } else {
        //FAiled to Add TAsk
        $_SESSION['add_fail'] = "Failed to Add Task";
        //Redirect to Add TAsk Page
        header('location:' . SITEURL . 'add-task.php');
    }

    // Redirect to login page
    header("Location: manage-user.php");
    exit();
}
view("add-user");
