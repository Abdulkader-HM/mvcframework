<?php

include 'layout.php';
$result = $_SESSION['user'];
if ($result->type === 'user') {
    ?>
    <center>
        <h1>Welcome User</h1>
    </center>

    <?php
} else {
    header('location:' . URLROOT . '');
}
