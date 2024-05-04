<?php
if (isset($_GET['id'])) {
    //Get the Values from DAtabase
    $id = $_GET['id'];

    //Connect Database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    //Select Database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    //SQL Query to Get the detail of selected task
    $sql = "SELECT * FROM users WHERE id=$id";

    //Execute Query
    $res = mysqli_query($conn, $sql);

    //Check if the query executed successfully or not
    if ($res == true) {
        //Query <br />Executed
        $row = mysqli_fetch_assoc($res);

        //Get the Individual Value
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];
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

                    if (isset($_SESSION['add_fail'])) {
                        echo $_SESSION['add_fail'];
                        unset($_SESSION['add_fail']);
                    }
                    ?>
                </p>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                
                <div class="mb-3 visually-hidden">
                        <label for="exampleLabel" class="form-label">id</label>
                        <input type="text" name="id" class="form-control" value="<?= $id; ?>" required="required" />
                    </div>    
                <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Type The Name" value=<?=$name?> required="required"/></td>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">User-Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Type The User-Name" value=<?=$username?> required="required" /></td>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select name="role" class="form-select" id="roleSelect">
                            <option value="1">Admin</option>
                            <option value="0">Staff</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Type The Password" value="<?=$password?>" required="required" /></td>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="submit">Update</button>
                </form>

            </div>
        </div>

    </div>

</div>
<script>
    
    document.getElementById("roleSelect").value = "<?=$role?>"; 
</script>