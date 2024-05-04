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
                            <th>Actions</th>
                        </thead>
                        <?php $count = 1; foreach ($model as $list) : ?> 
                        <tr>
                            <th><?= $count++; ?> </th>
                            <td><?= $list["list_name"] ?></td>
                            <td><?= $list["list_description"] ?></td>
                            <td>
                                <a href="<?= SITEURL; ?>update-list.php?list_id=<?= $list["list_id"] ?>"><button class="btn btn-primary btn-sm">Update</button></a>
                                <a href="<?= SITEURL; ?>delete-list.php?list_id=<?= $list["list_id"] ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="<?= SITEURL; ?>add-list.php"> <button class="btn btn-dark">Add List</button></a>
                </div>
            </div>
        </div>
    </div>
</div>