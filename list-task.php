<?php
include('config/app.php');
$list_id_url = $_GET['list_id'];

$sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";

$res = mysqli_query($conn, $sql);
if ($res) {

    $count_rows = mysqli_num_rows($res);
    
    if ($count_rows > 0) {
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
view("list-task", $row);

?>

