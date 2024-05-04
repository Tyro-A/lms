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
                        <?php $count = 1;
                        foreach ($model as $task) : ?>
                            <tr>
                                <th scope="row"><?= $count++; ?></th>
                                <td><?= $task['task_name']; ?></td>
                                <td><?= $task['priority']; ?></td>
                                <td><?= $task['deadline']; ?></td>
                                <td>
                                    <a href="<?= SITEURL; ?>update-task.php?task_id=<?= $task['task_id']; ?>" style="text-decoration:none;">
                                        <div class="btn btn-primary btn-sm">Update</div>
                                    </a>

                                    <a href="<?= SITEURL; ?>delete-task.php?task_id=<?= $task['task_id']; ?>" style="text-decoration:none;">
                                        <div class="btn btn-danger btn-sm">Delete</div>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="<?= SITEURL; ?>add-task.php"><button class="btn btn-dark">Add Task</button></a>
                </div>
            </div>
        </div>

    </div>

</div>