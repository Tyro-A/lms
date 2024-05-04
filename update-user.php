<?php
include('config/constants.php');

//Check the Task ID in URL



if (isset($_POST['submit'])) {
    //echo "Clicked";

    //Get the CAlues from Form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //Connect Database
    $conn3 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    //SElect Database
    $db_select3 = mysqli_select_db($conn3, DB_NAME) or die(mysqli_error());

    //CREATE SQL QUery to Update TAsk
    

    //Execute Query
    $stmt = $conn->prepare("UPDATE users SET name = ?,username = ?,password = ?,role = ? WHERE id = $id");
    $stmt->bind_param("ssss", $name, $username, $password, $role);
    if ($stmt->execute()) {
        //Query Executed and Task Inserted Successfully
        $_SESSION['add'] = "User Updated Successfully.";

        //Redirect to Homepage
        header('location:' . SITEURL);
    } else {
        //FAiled to Add TAsk
        $_SESSION['add_fail'] = "Failed to Update User";
        //Redirect to Add TAsk Page
        header('location:' . SITEURL . 'add-user.php');
    }


    //CHeck whether the Query Executed of Not
    if ($res3 == true) {
        //Query Executed and Task Updated
        $_SESSION['update'] = "User Updated Successfully.";

        //Redirect to Home Page
        header('location:' . SITEURL);
    } else {
        //FAiled to Update Task
        $_SESSION['update_fail'] = "Failed to Update User";

        //Redirect to this Page
        header('location:' . SITEURL . 'update-user.php?id=' . $id);
    }
}
view("update-user");
