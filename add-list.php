<?php
include('config/app.php');
if (isset($_POST['submit'])) {

    $list_name = $_POST['list_name'];
    $list_description = $_POST['list_description'];

    $sql = "INSERT INTO tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description'
        ";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['add'] = "List Added Successfully";

        header('location:' . SITEURL . 'manage-list.php');
    } else {

        $_SESSION['add_fail'] = "Failed to Add List";

        header('location:' . SITEURL . 'add-list.php');
    }
}

view("add-list");
