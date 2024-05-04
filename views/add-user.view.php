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
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Type The Name" required="required" /></td>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">User-Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Type The User-Name" required="required" /></td>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select name="role" class="form-select" id="">
                            <option value="1">Admin</option>
                            <option value="0">Staff</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Type The Password" required="required" /></td>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="submit">Add</button>
                </form>

            </div>
        </div>

    </div>

</div>