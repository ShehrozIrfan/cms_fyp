<?php
   include("connection.php");
   session_start();
   $msg = '';
   $msgClass = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form
      $email = mysqli_real_escape_string($connection,$_POST['email']);
      $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

      $query = "SELECT login_id FROM login WHERE email = '$email' and password = '$password'";

      $result = mysqli_query($connection,$query);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $email and $password, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $email;
         $_SESSION['success_message'] = "Welcome to CMS - GICCL";
         header("location: dashboard.php");
      }
      else {
         $msg = "Invalid email/password combination";
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
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modals.css">
</head>
<body>
  <div class="bg-modals"></div>
<script>
  $(document).ready(function() {
    $('#loginModal').modal('show');
  })
</script>
</body>
</html>
<div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="">
            <p class="modal-heading">Admin Login</p>
        </div>
        <div class="modal-body">
            <!-- contact section -->
            <section id="contact" class="">
                <div class="container">

                    <?php if ($msg != ''): ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center col-md-11 col-sm-12 col-xs-12 mx-auto mt-3 mb-3">
                        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ×
                        </button>
                        <?php echo $msg ?>
                    </div>
                    <?php endif ?>
                    <div class="row justify-content-center">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="email">Enter Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                <button type="submit" name="login" class="btn btn-dark btn-block">Login</button>
                            </form>
                            <p class="pt-3 d-none">Don't have an account? <a href="signup.php">Signup</a></p>
                        </div>
                    </div>
                </div>
            </section><!-- contact section ends -->
        </div>
        <div class="modal-footer">
            <a href="index.php" type="button" class="btn btn-primary">Back to Home</a>
        </div>
        </div>
    </div>
</div>
