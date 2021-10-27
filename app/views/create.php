<?php

include 'layout.php';
?>

<form method="POST">
   <fieldset class="container">
      <legend>
         <center>Add user</center>
      </legend>
      <div class="mb-3">
         <label class="form-label">Name</label>
         <input type="text" class="form-control" name="name" placeholder="Name" required>
      </div>
      <div class="mb-3">
         <label class="form-label">Email</label>
         <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
         <label class="form-label">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <a href="pages/adminpage" class="btn btn-success">Back</a>
   </fieldset>
</form>