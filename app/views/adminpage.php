<?php
include 'layout.php';
$result = $_SESSION['user'];
if ($result->type === 'admin') {
    ?>

    <div class="container">
        <div class="table-responsive-sm">
            <table class="table table-stiped table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" scope="col">#</th>
                        <th class="align-middle" scope="col">Name</th>
                        <th class="align-middle" scope="col">email</th>
                        <th class="align-middle text-center" scope="col">Action</th>
                        <th class="align-middle" scope="col">
                            <a href="create" class="btn btn-primary">Create New User</a>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'data.php'
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
} else {
    header('location:' . URLROOT . '');
}
