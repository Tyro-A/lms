

<div class="all-lists">
    <div class="all-task">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">

                    <table class="table table-striped table-hover">
                        <thead>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>User Type</th>
                            <th >Actions</th>
                        </thead>
                        <?php

                        //Connect the DAtabase
                        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                        //Select Database
                        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                        $loggedin_username = $_SESSION['username'];
                        //SQl Query to display all data fromo database
                        $sql = "SELECT * FROM users where username != '$loggedin_username'";

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
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $role = $row['role'];
                        ?>

                                    <tr>
                                        <th><?= $sn++; ?> </th>
                                        <td><?= $name; ?></td>
                                        <td><?= $username; ?></td>
                                        <td><?= ($role == 1) ? 'Admin' : 'Staff'; ?></td>
                                        <td>
                                            <a href="<?= SITEURL; ?>update-user.php?id=<?= $id; ?>"><button class="btn btn-primary btn-sm">Update</button></a>
                                            <a href="<?= SITEURL; ?>delete-user.php?id=<?= $id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
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
                    <a href="<?= SITEURL; ?>add-user.php"> <button class="btn btn-dark">Add User</button></a>
                </div>
            </div>
        </div>
    </div>
</div>