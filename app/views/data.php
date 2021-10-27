<?php

foreach ($data['users'] as $user) {
    ?>
    <tr>
        <th class="align-middle" scope="row"><?= $user->user_id  ?></th>
        <td class="align-middle"><?= $user->user_name ?></td>
        <td class="align-middle"><?= $user->user_email ?></td>
        <td class="align-middle text-center">
            <a class="btn btn-danger" href="<?php URLROOT?>?delete=<?= $user->user_id ?> ">Delete</a>

            <form method="GET">
                <button type="submit" name="edit" class="btn btn-success" value="<?= $user->user_id ?>">Edit</button>
            </form>

        </td>
    </tr>
    <?php
}
?>