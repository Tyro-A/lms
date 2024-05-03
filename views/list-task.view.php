<div class="wrapper">
    <!-- Menu Ends Here -->
    <div class="all-task">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">

                    <table class="table table-striped table-hover">

                        <thead class="thead-dark">
                            <th scope="col">S.N.</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Actions</th>
                        </thead>

                        <?php
                        $list_id_url = $_GET['list_id'];
                        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                        //SQL QUERY to display tasks by list selected
                        $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        $sn = 0;
                        if ($res == true) {
                            //Display the tasks based on list
                            //Count the Rows
                            $count_rows = mysqli_num_rows($res);

                            if ($count_rows > 0) {
                                //We have tasks on this list
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $task_id = $row['task_id'];
                                    $task_name = $row['task_name'];
                                    $priority = $row['priority'];
                                    $deadline = $row['deadline'];
                                    $sn++;
                        ?>

                                    <tr>
                                        <th scope="row"><?php echo $sn; ?></th>
                                        <td><?php echo $task_name; ?></td>
                                        <td><?php echo $priority; ?></td>
                                        <td><?php echo $deadline; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>" style="text-decoration:none;">
                                                <div class="btn btn-success btn-sm">Update</div>
                                            </a>

                                            <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>" style="text-decoration:none;">
                                                <div class="btn btn-danger btn-sm">Delete</div>
                                            </a>
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else {
                                //NO Tasks on this list
                                ?>

                                <tr>
                                    <td colspan="5">No Tasks added on this list.</td>
                                </tr>

                        <?php
                            }
                        }
                        ?>



                    </table>
                    <a href="<?php echo SITEURL; ?>add-task.php"><button class="btn btn-dark">Add Task</button></a>
                </div>
            </div>
        </div>

    </div>

</div>