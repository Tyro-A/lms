<div class="wrapper">
    <div class="container mt-3">
        <div class="row justify-content-center ">
            <div class="col-10">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Task Name</label>
                        <input type="text" name="task_name" class="form-control" placeholder="Type your Task Name" required="required" /></td>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Task Description</label>
                        <textarea name="task_description" class="form-control" placeholder="Type Task Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Select List</label>
                        <select name="list_id" class="form-select" id="">
                            <?php foreach($model as $list) : ?>
                            <option value="<?= $list['list_id']; ?>"><?= $list['list_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Priority:</label>
                        <select name="priority" class="form-select" id="">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" />
                    </div>

                    <button type="submit" class="btn btn-secondary" name="submit">Add</button>
                </form>

            </div>
        </div>

    </div>

</div>