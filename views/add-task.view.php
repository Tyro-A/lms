<div class="wrapper">
    <div class="container mt-3">
        <div class="row justify-content-center ">
            <div class="col-10">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Task Name</label>
                        <input type="text" name="task_name" class="form-control" placeholder="Type your Task Name" required="required" /></td>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Task Description</label>
                        <textarea name="task_description" class="form-control" placeholder="Type Task Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Select List</label>
                        <select name="list_id" class="form-select" id="">
                            <?php

                            //Connect Database
                            $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                            //SElect Database
                            $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                            //SQL query to get the list from table
                            $sql = "SELECT * FROM tbl_lists";

                            //Execute Query
                            $res = mysqli_query($conn, $sql);

                            //Check whether the query executed or not
                            if ($res == true) {
                                //Create variable to Count Rows
                                $count_rows = mysqli_num_rows($res);

                                //If there is data in database then display all in dropdows else display None as option
                                if ($count_rows > 0) {
                                    //display all lists on dropdown from database
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $list_id = $row['list_id'];
                                        $list_name = $row['list_name'];
                            ?>
                                        <option value="<?= $list_id ?>"><?= $list_name; ?></option>
                                    <?php
                                    }
                                } else {
                                    //Display None as option
                                    ?>
                                    <option value="0">None</option>p
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Priority:</label>
                        <select name="priority" class="form-select" id="">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" />
                    </div>

                    <button type="submit" class="btn btn-secondary" name="submit">Add</button>
                </form>

            </div>
        </div>

    </div>

</div>