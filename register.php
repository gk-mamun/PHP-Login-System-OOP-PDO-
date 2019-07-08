<?php include('includes/header.php'); ?>

<?php 
  
?>

<main>
  <div class="alert-box">
    <?php 
      if(isset($_GET['error'])) {
        if($_GET['error'] == 'empty') {
          echo '<p class="alert alert-danger">Fill in all fields!</p>';
          $username = $_GET['name'];
          $email = $_GET['mail'];
        }
        else if($_GET['error'] == 'checkpass') {
          echo '<p class="alert alert-danger">Password doesn\'t match!</p>';
          $username = $_GET['name'];
          $email = $_GET['mail'];
        }
        else if($_GET['error'] == 'userexists') {
          echo '<p class="alert alert-danger">User already exists!</p>';
        }
      }
      else if(isset($_GET['register']) == 'success') {
        echo '<p class="alert alert-success">Register Successfully.<a href="login.php">Login Here</a></p>';
      }
      
    ?>
  </div>
  <div class="custom-form">
  <h2 class="form-head">Create Your Account</h2>
    <form method="post" action="model/register.inc.php">
      <div class="form-group">
        <label>User Name</label>
        <input name="uname" type="text" class="form-control" placeholder="Enter User Name">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input name="confirm-password" type="password" class="form-control" placeholder="Confirm Password">
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Create Account</button>
      <p>Already a user? <a href="login.php" class="btn-default">Login Here</a></p>
    </form>
  </div>
</main>

<?php include('includes/footer.php'); ?>
