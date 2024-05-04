<?php
include('config/constants.php');
if (isset($_POST['submit'])) {
    //Get all the Values from Form
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $list_id = $_POST['list_id'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];

    //SElect Database
    

    //CReate SQL Query to INSERT DATA into DAtabase
    $sql2 = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline'
        ";

    //Execute Query
    $res2 = mysqli_query($conn, $sql2);

    //Check whetehre the query executed successfully or not
    if ($res2 == true) {
        //Query Executed and Task Inserted Successfully
        $_SESSION['add'] = "Task Added Successfully.";

        //Redirect to Homepage
        header('location:' . SITEURL);
    } else {
        //FAiled to Add TAsk
        $_SESSION['add_fail'] = "Failed to Add Task";
        //Redirect to Add TAsk Page
        header('location:' . SITEURL . 'add-task.php');
    }
}
view("add-task");
?>


