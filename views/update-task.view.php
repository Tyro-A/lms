<?php
if (isset($_GET['task_id'])) {
    //Get the Values from DAtabase
    $task_id = $_GET['task_id'];

    //Connect Database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    //Select Database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    //SQL Query to Get the detail of selected task
    $sql = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";

    //Execute Query
    $res = mysqli_query($conn, $sql);

    //Check if the query executed successfully or not
    if ($res == true) {
        //Query <br />Executed
        $row = mysqli_fetch_assoc($res);

        //Get the Individual Value
        $task_name = $row['task_name'];
        $task_description = $row['task_description'];
        $list_id = $row['list_id'];
        $priority = $row['priority'];
        $deadline = $row['deadline'];
    }
} else {
    //Redirect to Homepage
    header('location:' . SITEURL);
}
?>
<div class="wrapper">

    <div class="container mt-3">

        <div class="row justify-content-center ">
            <div class="col-10">
                <p>
                    <?php
                    if (isset($_SESSION['update_fail'])) {
                        echo $_SESSION['update_fail'];
                        unset($_SESSION['update_fail']);
                    }
                    ?>
                </p>

                <form method="POST" action="">
                    <div class="mb-3 visually-hidden">
                        <label for="exampleLabel" class="form-label">List id</label>
                        <input type="text" name="task_id" class="form-control" value="<?= $task_id; ?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="example" class="form-label">Task Name:</label>
                        <input type="text" name="task_name" class="form-control" value="<?= $task_name; ?>" required="required" />
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Task Description</label>
                        <textarea name="task_description" class="form-control">
                        <?= $task_description; ?>
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ascc" class="form-label">Select List:</label>
                        <select name="list_id" class="form-select" id="">
                            <?php
                            //Connect Database
                            $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                            //SElect Database
                            $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());

                            //SQL Query to GET Lists
                            $sql2 = "SELECT * FROM tbl_lists";

                            //Execute Query
                            $res2 = mysqli_query($conn2, $sql2);

                            //Check if executed successfully or not
                            if ($res2 == true) {
                                //Display the Lists
                                //Count Rows
                                $count_rows2 = mysqli_num_rows($res2);

                                //Check whether list is added or not
                                if ($count_rows2 > 0) {
                                    //Lists are Added
                                    while ($row2 = mysqli_fetch_assoc($res2)) {
                                        //Get individual value
                                        $list_id_db = $row2['list_id'];
                                        $list_name = $row2['list_name'];
                            ?>

                                        <option <?php if ($list_id_db == $list_id) {
                                                    echo "selected='selected'";
                                                } ?> value="<?= $list_id_db; ?>"><?= $list_name; ?></option>

                                    <?php
                                    }
                                } else {
                                    //No List Added
                                    //Display None as option
                                    ?>
                                    <option <?php if ($list_id = 0) {
                                                echo "selected='selected'";
                                            } ?> value="0">None</option>p
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="example" class="form-label">Priority</label>
                        <select name="priority" class="form-select" id="">
                            <option <?php if ($priority == "High") {
                                        echo "selected='selected'";
                                    } ?> value="High">High</option>
                            <option <?php if ($priority == "Medium") {
                                        echo "selected='selected'";
                                    } ?> value="Medium">Medium</option>
                            <option <?php if ($priority == "Low") {
                                        echo "selected='selected'";
                                    } ?> value="Low">Low</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="example" class="form-label">Deadline:</label>
                        <input type="date" name="deadline" class="form-control" value="<?= $deadline; ?>" />
                    </div>


                    <button type="submit" class="btn btn-primary" name="submit">Make Changes</button>
                </form>
            </div>


        </div>
    </div>
</div>