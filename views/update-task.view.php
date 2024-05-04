<?php
if (is_array($model) && count($model) > 0) {
    $tasks = $model['task'];
    $list = $model['list'];
}
?>
<div class="wrapper">
    <div class="container mt-3">
        <div class="row justify-content-center ">
            <div class="col-10">

                <form method="POST" action="">
                    <?php foreach ($tasks as $task) : ?>
                        <div class="mb-3 visually-hidden">
                            <label for="exampleLabel" class="form-label">List id</label>
                            <input type="text" name="task_id" class="form-control" value="<?= $task['task_id'] ?>" required="required" />
                        </div>
                        <div class="mb-3">
                            <label for="example" class="form-label">Task Name:</label>
                            <input type="text" name="task_name" class="form-control" value="<?= $task['task_name'] ?>" required="required" />
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Task Description</label>
                            <textarea name="task_description" class="form-control"><?= $task['task_description'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ascc" class="form-label">Select List:</label>
                            <select name="list_id" class="form-select" id="">
                                <?php foreach ($list as $list_item) : ?>
                                    <option value="<?= $list_item['list_id'] ?>"><?= $list_item['list_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="example" class="form-label">Priority</label>
                            <select name="priority" class="form-select" id="">
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="example" class="form-label">Deadline:</label>
                            <input type="date" name="deadline" class="form-control" value="<?= date('Y-m-d', strtotime($task['deadline'])) ?>" />
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary" name="submit">Make Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>