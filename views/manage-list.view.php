<div class="all-lists">
    <div class="all-task">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">

                    <table class="table table-striped table-hover">
                        <thead>
                            <th>S.N.</th>
                            <th>List Name</th>
                            <th>List Description</th>
                            <th >Actions</th>
                        </thead>
                        <?php

                        //Connect the DAtabase
                        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                        //Select Database
                        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                        //SQl Query to display all data fromo database
                        $sql = "SELECT * FROM tbl_lists";

                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the query executed executed successfully or not
                        if ($res == true) {
                            //work on displaying data
                            //echo "Executed";

                            //Count the rows of data in database
                            $count_rows = mysqli_num_rows($res);

                            //Create a SErial Number Variable
                            $sn = 1;

                            //Check whether there is data in database of not
                            if ($count_rows > 0) {
                                //There's data in database' Display in table

                                while ($row = mysqli_fetch_assoc($res)) {
                                    //Getting the data from database
                                    $list_id = $row['list_id'];
                                    $list_name = $row['list_name'];
                                    $list_description = $row['list_description'];
                        ?>

                                    <tr>
                                        <th><?= $sn++; ?> </th>
                                        <td><?= $list_name; ?></td>
                                        <td><?= $list_description; ?></td>
                                        <td>
                                            <a href="<?= SITEURL; ?>update-list.php?list_id=<?= $list_id; ?>"><button class="btn btn-primary btn-sm">Update</button></a>
                                            <a href="<?= SITEURL; ?>delete-list.php?list_id=<?= $list_id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                        </td>
                                    </tr>

                                <?php

                                }
                            } else {
                                //No Data in Database
                                ?>

                                <tr>
                                    <td colspan="3">No List Added Yet.</td>
                                </tr>

                        <?php
                            }
                        }

                        ?>


                    </table>
                    <a href="<?= SITEURL; ?>add-list.php"> <button class="btn btn-dark">Add List</button></a>
                </div>
            </div>
        </div>
    </div>
</div>