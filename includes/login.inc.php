<?php
  // Check if user pressed login
  if (isset($_POST['login-submit'])) {

    // Connect to server database
    require '../db.php';

    // Get details from signup form
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if($mailuid == "admin"){
    if (empty($mailuid) || empty($password)) {
      header("Location: ../register.php?error=emptyfields".$mailuid);
      exit();
    }
    // Check if username & password match in db
    else {
      $sql = "SELECT * FROM users WHERE uidUsers=?;";
      // Initialise sql statement
      $stmt = mysqli_stmt_init($conn);
      // Check if sql statement works without errors
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // If there is a result, store results in assosciative array
        if ($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if ($pwdCheck == false) {
            header("Location: ../register.php?error=wrongpwd");
            exit();
          } else if($pwdCheck == true){
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUId'] = $row['uidUsers'];

            header("Location: ../IGManager.php?login=adminsuccess");
            exit();
          } else {
            header("Location: ../register.php?error=wrongpwd");
            exit();
          }
        }
        // Else show error
        else {
          header("Location: ../register.php?error=nouser");
          exit();
        }
      }
    }
    // Close all connections
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Show error if fields are empty
    if (empty($mailuid) || empty($password)) {
      header("Location: ../register.php?error=emptyfields".$mailuid);
      exit();
    }
    // Check if username & password match in db
    else {
      $sql = "SELECT * FROM users WHERE uidUsers=?;";
      // Initialise sql statement
      $stmt = mysqli_stmt_init($conn);
      // Check if sql statement works without errors
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // If there is a result, store results in assosciative array
        if ($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if ($pwdCheck == false) {
            header("Location: ../register.php?error=wrongpwd");
            exit();
          } else if($pwdCheck == true){
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUId'] = $row['uidUsers'];

            header("Location: ../userArticle.php?login=success");
            exit();
          } else {
            header("Location: ../register.php?error=wrongpwd");
            exit();
          }
        }
        // Else show error
        else {
          header("Location: ../register.php?error=nouser");
          exit();
        }
      }
    }
    // Close all connections
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
  }
else {
  header("Location: ../register.php");
  exit();
}
?>
