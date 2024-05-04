<?php
include('config/app.php');
if (isset($_POST['submit'])) {

    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $list_description = $_POST['list_description'];

    $sql = "UPDATE tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description' 
            WHERE list_id= $list_id";

    $res = mysqli_query($conn, $sql);
    if ($res) {

        $_SESSION['update'] = "List Updated Successfully";

        header('location:' . SITEURL . 'manage-list.php');
    } else {

        $_SESSION['update_fail'] = "Failed to Update List";
        header('location:' . SITEURL . 'update-list.php?list_id=' . $list_id);
    }
}
if (isset($_GET['list_id'])) {

    $list_id = $_GET['list_id'];

    $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";

    $res = mysqli_query($conn, $sql);

    if ($res) {

        $count_rows = mysqli_num_rows($res);

        if ($count_rows > 0) {
            $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
}

view("update-list", $row);
?>