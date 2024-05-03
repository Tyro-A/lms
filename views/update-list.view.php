<?php
if (isset($_GET['list_id'])) {
    //Get the List ID value
    $list_id = $_GET['list_id'];

    //Connect to Database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    //SElect DAtabase
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    //Query to Get the Values from Database
    $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";

    //Execute Query
    $res = mysqli_query($conn, $sql);

    //CHekc whether the query executed successfully or not
    if ($res == true) {
        //Get the Value from Database
        $row = mysqli_fetch_assoc($res); //Value is in array
        //printing $row array
        //print_r($row);

        //Create Individual Variable to save the data
        $list_name = $row['list_name'];
        $list_description = $row['list_description'];
    } else {
        //Go Back to Manage List Page
        header('location:' . SITEURL . 'manage-list.php');
    }
}
//Check whether the session is set or not
if (isset($_SESSION['update_fail'])) {
    echo $_SESSION['update_fail'];
    unset($_SESSION['update_fail']);
}
?>

<div class="wrapper">

    <div class="container mt-3">

        <div class="row justify-content-center ">
            <div class="col-10">

                <form method="POST" action="">
                    <div class="mb-3 visually-hidden">
                        <label for="exampleLabel" class="form-label">List id</label>
                        <input type="text" name="list_id" class="form-control" value="<?= $list_id; ?>" required="required" />
                    </div>
                        <div class="mb-3">
                            <label for="exampleLabel" class="form-label">List Name</label>
                            <input type="text" name="list_name" class="form-control" value="<?= $list_name; ?>" required="required" />

                        </div>

                        <div class="mb-3">
                            <label for="exampleDesc" class="form-label">List Description</label>
                            <textarea name="list_description" class="form-control">
                            <?= $list_description; ?>
                        </textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Make Changes</button>
                </form>

            </div>


            <div class="col-lg-3"></div>

        </div>

    </div>
</div>