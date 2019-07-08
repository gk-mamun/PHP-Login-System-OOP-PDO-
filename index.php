<?php include('config/config.php'); ?>
<?php include('includes/header.php'); ?>

<main>
  <div class="welcome-sec">
    <div class="card">
      <div class="card-body">
      <?php 
        if(isset($_SESSION['user-name'])) {
          $user = $_SESSION['user-name'];

          echo '<h1>Hi, '.$user.'</h1>';
        }
        else if(isset($_GET['logout'])){
         
          if($_GET['logout'] == 'success') {
            echo '<p>You are Logged Out';
          }
     
        }
        else {
          echo '<h3>Welcome To Our Site</h3><br><p>To explore <a href="login.php">login</a></p>';
        }
      ?>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
