<?php
   include("connection.php");
   session_start();
   $msg = '';
   $msgClass = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $username = mysqli_real_escape_string($connection,$_POST['username']);
      $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

      $query = "SELECT login_id FROM login WHERE username = '$username' and password = '$password'";

      $result = mysqli_query($connection,$query);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $username;
         $_SESSION['success_message'] = "Welcome to CMS - GICCL";
         header("location: dashboard.php");
      }
      else {
         $msg = "Invalid username/password combination";
         $msgClass = "danger";
      }
   }
?>

<?php

if(isset($_SESSION['login_user'])) {
  header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <!-- contact section -->
    <section id="contact" class="pd_top">
        <div class="container">
            <h2 class="text-center font-weight-bold mt-3 mb-3">Admin Login</h2>
            <?php if ($msg != ''): ?>
              <div class="alert alert-<?php echo $msgClass ?> text-center col-md-6 mx-auto mt-3 mb-3">
                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                          ×
                </button>
                <?php echo $msg ?>
              </div>
            <?php endif ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Userame" required>
                          </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="login" class="btn btn-dark btn-block">Login</button>
                      </form>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->

    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="app.js"></script>
</body>
</html>
