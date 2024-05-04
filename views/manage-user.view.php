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
                            <th>Actions</th>
                        </thead>
                        <?php $count = 1;
                        foreach ($model as $user) :
                        ?>
                            <tr>
                                <th><?= $count++; ?> </th>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= ($user['role'] == 1) ? 'Admin' : 'Staff'; ?></td>
                                <td>
                                    <a href="<?= SITEURL; ?>update-user.php?id=<?= $user['id']; ?>"><button class="btn btn-primary btn-sm">Update</button></a>
                                    <a href="<?= SITEURL; ?>delete-user.php?id=<?= $user['id']; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="<?= SITEURL; ?>add-user.php"> <button class="btn btn-dark">Add User</button></a>
                </div>
            </div>
        </div>
    </div>
</div>