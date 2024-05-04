<div class="wrapper">
    <div class="container mt-3">
        <div class="row justify-content-center ">
            <div class="col-10">
                <?php
                if (is_array($model) && count($model) > 0) {
                    $list = $model[0];
                }
                ?>
                <form method="POST" action="">
                    <div class="mb-3" visually-hidden>
                        <label for="exampleLabel" class="form-label">List id</label>
                        <input type="text" name="list_id" class="form-control" value="<?= $list["list_id"]; ?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleLabel" class="form-label">List Name</label>
                        <input type="text" name="list_name" class="form-control" value="<?= $list["list_name"]; ?>" required="required" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleDesc" class="form-label">List Description</label>
                        <textarea name="list_description" class="form-control">
                            <?= $list["list_description"]; ?>
                        </textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Make Changes</button>
                </form>
            </div>
            <div class="col-lg-3"></div>

        </div>

    </div>
</div>