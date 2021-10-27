<?php

include 'layout.php';
$result = $_SESSION['user'];
if ($result->type === 'user') {
    ?>
    <center>
        <h1>Welcome <?php echo $result->user_name?></h1><br>
        <a href="pages/logout" class="btn btn-danger">logout</a>
    </center>

    <?php
} else {
    header('location:' . URLROOT . '');
}
