<?php

include 'layout.php';
?>

<form class="row g-3" dir="rtl" method="POST" action="login">
<a href="<?php URLROOT ?> pages/signup" class="btn btn-success" >register</a>

    <div class="col-auto">
        <button type="submit" name='submit' class="btn btn-primary mb-1">Log in</button>
    </div>
    <div class="col-auto">
        <label class="visually-hidden">Password</label>
        <input type="password" name='password' class="form-control" placeholder="Password" required>
    </div>
    <div class="col-auto">
        <label class="visually-hidden">Email</label>
        <input type="text" name='email' class="form-control-plaintext" placeholder="Email@hotmail.com" required>
    </div>

</form>