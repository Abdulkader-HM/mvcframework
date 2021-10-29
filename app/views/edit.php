<?php
include 'layout.php';
?>
<form method="POST" action="pages/adminpage">
    <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
    <fieldset class="container">
        <legend>
            <center>Edit page</center>
        </legend>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?= $data[0]->user_name ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="adminpage" class="btn btn-success">Back</a>
    </fieldset>
</form>