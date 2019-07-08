<?php require '../config/config.php'; ?>
<?php

  $database = new Database;
  
  if(isset($_POST['submit'])){
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirm-password'];

    $database->query('SELECT * FROM users WHERE Name = :name OR Email = :email');
    $database->bind(':name', $name);
    $database->bind(':email', $email);
    $database->execute();
    $result = $database->resultset();

    if(empty($name) || empty($email) || empty($password1) || empty($password2)) {
      $error = 'empty';
      header("Location: ../register.php?error=".$error."&name=".$name."&mail=".$email);
      exit();
    }
    else if ($password1 !== $password2) {
      $error = 'checkpass';
      header("Location: ../register.php?error=".$error."&name=".$name."&mail=".$email);
      exit();
    }
    else if($result) {
      $error = 'userexists';
      header("Location: ../register.php?error=".$error);
      exit();
    }
    else {
      $hashedPass = password_hash($password1, PASSWORD_DEFAULT);
      $database->query('INSERT INTO users (Name, Email, pass) VALUES (:name, :email, :password)');
      $database->bind(':name', $name);
      $database->bind(':email', $email);
      $database->bind(':password', $hashedPass);
      $database->execute();
      header("Location: ../register.php?register=success");
    }
  }