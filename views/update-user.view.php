<?php
$user = []; 
if (is_array($model) && count($model) > 0) {
    $user = $model[0]; 
}
?>
<div class="wrapper">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-10">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3 visually-hidden">
                        <label for="exampleLabel" class="form-label">id</label>
                        <input type="text" name="id" class="form-control" value="<?= $user['id']?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Type The Name" value="<?=  $user['name']?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User-Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Type The User-Name" value="<?= $user['username']?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select name="role" class="form-select" id="roleSelect">
                            <option value="1" <?= $user['role'] ?>>Admin</option>
                            <option value="0" <?= $user['role'] ?>>Staff</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Type The Password" value="<?= $user['password']?>" required="required" />
                    </div>
                    <button type="submit" class="btn btn-secondary" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("roleSelect").value = "<?= isset($role) ? $role : '' ?>";
</script>
