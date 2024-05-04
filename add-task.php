<?php
include('config/app.php');
if (isset($_POST['submit'])) {

    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $list_id = $_POST['list_id'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline'
        ";

    $res = mysqli_query($conn, $sql);

    if ($res) {

        $_SESSION['add'] = "Task Added Successfully.";

        header('location:' . SITEURL);
    } else {

        $_SESSION['add_fail'] = "Failed to Add Task";

        header('location:' . SITEURL . 'add-task.php');
    }
}

$sql = "SELECT * FROM tbl_lists";
$res = mysqli_query($conn, $sql);
if ($res) {
    $count_rows = mysqli_num_rows($res);
    if ($count_rows > 0) {
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
view("add-task", $row);
?>
