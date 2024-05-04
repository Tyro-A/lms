<?php
include('config/app.php');
if (isset($_POST['submit'])) {

    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $list_id = $_POST['list_id'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];

    //CREATE SQL QUery to Update TAsk
    $sql = "UPDATE tbl_tasks SET 
        task_name = '$task_name',
        task_description = '$task_description',
        list_id = '$list_id',
        priority = '$priority',
        deadline = '$deadline'
        WHERE 
        task_id = $task_id
        ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['update'] = "Task Updated Successfully.";

        header('location:' . SITEURL);
    } else {

        $_SESSION['update_fail'] = "Failed to Update Task";

        header('location:' . SITEURL . 'update-task.php?task_id=' . $task_id);
    }
}

if (isset($_GET['task_id'])) {

    $task_id = $_GET['task_id'];

    $sql = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";

    $res = mysqli_query($conn, $sql);

    if ($res) {

        $count_rows = mysqli_num_rows($res);

        if ($count_rows > 0) {
            $row1 = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
    }
}
$sql = "SELECT * FROM tbl_lists";
$res = mysqli_query($conn, $sql);
if ($res) {
    $count_rows = mysqli_num_rows($res);
    if ($count_rows > 0) {
        $row2 = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
$row = array(
    'task' => $row1,
    'list' => $row2, // Just to demonstrate non-matching keys
);
view("update-task", $row);
