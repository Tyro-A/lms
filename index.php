<?php
include('config/constants.php');
view("index");
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}


if (isset($_SESSION['delete_fail'])) {
    echo $_SESSION['delete_fail'];
    unset($_SESSION['delete_fail']);
}
?>