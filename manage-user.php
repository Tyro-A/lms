<?php

include('config/constants.php');
view("manage-user");
if (isset($_SESSION['add'])) {
    //display message
    echo $_SESSION['add'];
    //REmove the message after displaying one time
    unset($_SESSION['add']);
}

//Check the session for Delete

if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

//Check Session Message for Update
if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

//Check for Delete Fail
if (isset($_SESSION['delete_fail'])) {
    echo $_SESSION['delete_fail'];
    unset($_SESSION['delete_fail']);
}

?>

