<?php #include 'connection.php' ?>
<?php
// if(isset($_POST['login'])) {
//     $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
//     $password = md5(mysqli_real_escape_string($connection,$_POST['password']));
//     $query = "INSERT INTO login(username, password) ";
//     $query .= "VALUES('$username','$password')";
//     $result = mysqli_query($connection, $query);
//     if(!$result) {
//         die("Query Failed .. !" . mysqli_error($connection));
//     } else {
//        echo 'Success';
//     }
// }
?>
<?php
   include("connection.php");
   session_start();
   $msg = '';
   $msgClass = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Data sent from form
      $username = mysqli_real_escape_string($connection,$_POST['username']);
      $email = mysqli_real_escape_string($connection, $_POST['email']);
      $matchPassword = mysqli_real_escape_string($connection,$_POST['password']);
      $matchPassConfirmation = mysqli_real_escape_string($connection,$_POST['passwordConfirmation']);


        if(!empty(trim($username)) && !empty(trim($matchPassword)) && !empty(trim($matchPassConfirmation))) {
            if(strlen($username) < 3) {
                $msg = "Username must be atleast 3 characters!";
                $msgClass = "danger";
            }
            else if(strlen($matchPassword) < 8) {
                $msg = "Password must be atleast 8 characters!";
                $msgClass = "danger";
            }
            else if(strlen($matchPassword != $matchPassConfirmation)) {
                $msg = "Password & password confirmation doesn't match!";
                $msgClass = "danger";
            }
            else {
                $password = md5(mysqli_real_escape_string($connection, $matchPassword));
                $query = "INSERT INTO signup(username, email, password) ";
                $query .= "VALUES('$username', '$email', '$password')";

                $result = mysqli_query($connection,$query);

                if(!$result) {
                    #die("Query Failed .. !" . mysqli_error($connection));
                    $msg = "Email already exists!";
                    $msgClass = "danger";
                } else {
                    $_SESSION['login_user'] = $email;
                    $_SESSION['success_message'] = "Welcome to CMS - GICCL";
                    header("location: dashboard.php");
                }

            }
        } else {
            $msg = "Fields must not be blank!";
            $msgClass = "danger";
        }
    }
?>

<?php

// if(isset($_SESSION['login_user'])) {
//   header("location: dashboard.php");
// }
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
    <div class="bg-modals"></div>
<script>
  $(document).ready(function() {
    $('#signupModal').modal('show');
  })
</script>
</body>
</html>
<div class="modal fade" id="signupModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="">
            <p class="modal-heading">Signup</p>
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
                            <form action="signup.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Userame" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                <label for="password">Password Confirmation</label>
                                <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmation" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group">
                                <button type="submit" name="signup" class="btn btn-dark btn-block">Signup</button>
                            </form>
                            <p class="pt-3">Already have an account? <a href="login.php">Login</a></p>
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
