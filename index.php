<?php
include('config/app.php');
$sql = "SELECT * FROM tbl_tasks";
$res = mysqli_query($conn, $sql);
if ($res) {

    $count_rows = mysqli_num_rows($res);
    
    if ($count_rows > 0) {
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
view("index", $row);
