<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}
include('config/app.php');

if(isset($_SESSION['username'])) { 
    $loggedin_username = $_SESSION['username'];

    $sql = "SELECT * FROM users where username != '$loggedin_username'";
    $res = mysqli_query($conn, $sql);
    
    $row = [];
    if ($res) {
        $count_rows = mysqli_num_rows($res);
        
        if ($count_rows > 0) {
            $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
    
    view("manage-user", $row);
} else {
    // Handle the case when $_SESSION['username'] is not set
}
?>
