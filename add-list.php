<?php
include('config/constants.php');
if (isset($_POST['submit'])) {
    //echo "Form Submitted";

    //Get the values from form and save it in variables
    $list_name = $_POST['list_name'];
    $list_description = $_POST['list_description'];

    //Connect Database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    //Check whether the database connected or not
    /*
        if($conn==true)
        {
            echo "Database Connected";
        }
        */

    //SElect Database
    $db_select = mysqli_select_db($conn, DB_NAME);

    //Check whether database is connected or not
    /*
        if($db_select==true)
        {
            echo "Database SElected";
        }
        */
    //SQL Query to Insert data into database
    $sql = "INSERT INTO tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description'
        ";

    //Execute Query and Insert into Database
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Data inserted successfully
        //echo "Data Inserted";

        //Create a SESSION VAriable to Display message
        $_SESSION['add'] = "List Added Successfully";

        //Redirect to Manage List Page
        header('location:' . SITEURL . 'manage-list.php');
    } else {
        //Failed to insert data
        //echo "Failed to Insert Data";

        //Create SEssion to save message
        $_SESSION['add_fail'] = "Failed to Add List";

        //REdirect to Same Page
        header('location:' . SITEURL . 'add-list.php');
    }
}
if (isset($_SESSION['add_fail'])) {
    //display session message
    echo $_SESSION['add_fail'];
    //Remove the message after displaying once
    unset($_SESSION['add_fail']);
}
view("add-list");
?>




