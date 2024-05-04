<?php
include('config/app.php');
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET name = ?,username = ?,password = ?,role = ? WHERE id = $id");
    $stmt->bind_param("ssss", $name, $username, $password, $role);
    if ($stmt->execute()) {

        $_SESSION['add'] = "User Updated Successfully.";

        header('location:' . SITEURL.'manage-user.php');
    } else {

        $_SESSION['add_fail'] = "Failed to Update User";
        header('location:' . SITEURL . 'add-user.php');
    }
}
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $count_rows = mysqli_num_rows($res);
        if ($count_rows > 0) {
            $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
}

view("update-user",$row);
