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
                            <?php $count = 1;  foreach ($model as $task) : ?>
                                <tr>
                                    <th scope="row"><?=$count++?></th>
                                    <td><?= $task['task_name']; ?></td>
                                    <td><?= $task['priority']; ?></td>
                                    <td><?= $task['deadline']; ?></td>
                                    <td>
                                        <a href="<?= SITEURL; ?>update-task.php?task_id=<?= $task['task_id'];?>" class="btn btn-primary btn-sm">Update</a>
                                        <a href="<?= SITEURL; ?>delete-task.php?task_id=<?= $task['task_id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= SITEURL; ?>add-task.php"><button class="btn btn-dark">Add Task</button></a>
                </div>
            </div>
        </div>


    </div>
</div>