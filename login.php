<?php include('includes/header.php'); ?>

<main>
<div class="custom-form">
  <h2 class="form-head">Login</h2>
    <form method="post" action="model/login.inc.php">
      <div class="form-group">
        <label>User Name</label>
        <input name="uname" type="text" class="form-control" placeholder="Enter User Name">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password">
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Login</button>
      <p>Not a user? <a href="register.php" class="btn-default">Register Here</a></p>
    </form>
  </div>
</main>

<?php include('includes/footer.php'); ?>
