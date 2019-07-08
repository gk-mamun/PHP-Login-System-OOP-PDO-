<?php require '../config/config.php'; ?>
<?php

  $database = new Database;
  
  if(isset($_POST['submit'])){
    $name = trim($_POST['uname']);
    $password = trim($_POST['password']);

    if(empty($name) || empty($password)) {
      $error = 'empty';
      header("Location: ../login.php?error=".$error);
      exit();
    }
    else {
      $database->query('SELECT * FROM users WHERE Name = :uname');
      $database->bind(':uname', $name);
      $result = $database->singleresult();

      if($result == true) {
        $validPassword = password_verify($password, $result['pass']);
        if ($validPassword == true) {
          session_start();
          $_SESSION['user-name'] = $result['Name'];
          header("Location: ../index.php?login=success");
          exit();
        }
        else {
          $error = "Invalidpass";
          header("Location: ../login.php?error=".$error);
          exit();
        }
      }
      else {
        $error = 'notuser';
        header("Location: ../login.php?error=".$error);
        exit();
      }
    }

  }