<?php
  // Check if user pressed submit
  if (isset($_POST['register-submit'])) {

    // Connect to server database
    require '../db.php';

    // Get details from signup form
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // Show error if fields are empty
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    // Show error if invalid email & username
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: ../register.php?error=invalidmailuid");
      exit();
    }
    // Show error if invalid email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../register.php?error=invalidmail&uid=".$username);
      exit();
    }
    // Show error if invalid username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../register.php?error=invaliduid&mail=".$email);
      exit();
    }
    // Show error if passwords don't match
    else if ($password !== $passwordRepeat) {
      header("Location: ../register.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();
    }
    // Check if username already exists in db
    else {
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
      $stmt = mysqli_stmt_init($conn);
      // Check if sql statement works
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        // If username already exists (rows > 0) show error
        if ($resultCheck > 0) {
          header("Location: ../register.php?error=usertaken&mail=".$email);
          exit();
        }
        // Else insert data into db
        else {
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
          } else {
            $hashpwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../register.php?register=success");
            exit();
          }
        }
      }
    }
    // Close all connections
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else {
    header("Location: ../register.php");
    exit();
  }
?>
