<?php

include 'layout.php';
?>
<form method="POST">
   <fieldset class="container">
      <legend>
         <center>Sign Up page</center>
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
      <div class="mb-3">
         <label class="form-label">confirme password</label>
         <input type="password" class="form-control" name="cpassword" placeholder="confirme password" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <a href="./" class="btn btn-success">Back</a>
   </fieldset>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>