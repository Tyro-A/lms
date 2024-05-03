<div class="wrapper">
    <div class="all-tasks">


        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Connect Database
                            $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                            // Select Database
                            $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                            // Create SQL Query to Get Data from Database
                            $sql = "SELECT * FROM tbl_tasks";

                            // Execute Query
                            $res = mysqli_query($conn, $sql);

                            // Check whether the query executed or not
                            if ($res == true) {
                                // Display the Tasks from Database
                                // Count the Tasks on Database first
                                $count_rows = mysqli_num_rows($res);

                                // Create Serial Number Variable
                                $sn = 0;

                                // Check whether there is a task on database or not
                                if ($count_rows > 0) {
                                    // Data is in Database
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
                                                <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>" class="btn btn-primary btn-sm">Update</a>
                                                <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>" class="btn btn-danger btn-sm">Remove</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    // No data in Database
                                    ?>
                                    <tr>
                                        <td colspan="5">No Task Added Yet.</td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="<?php echo SITEURL; ?>add-task.php"><button class="btn btn-dark">Add Task</button></a>
                </div>
            </div>
        </div>


    </div>
</div>