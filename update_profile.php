<?php require_once 'session.php' ?>
<?php require_once 'global_update_profile.php' ?>

<?php
if(!isset($_SESSION['login_user'])) {
    header('location: login.php');
    die();
  }
?>

<?php
   $msg = '';
   $msgClass = '';
   if(isset($_POST['update'])) {
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = $_POST['password'];
        $password_confirmation = $_POST['confirm_password'];
        if(strlen($password) < 8) {
            $msg = "Password must be atleast 8 characters!";
            $msgClass = "danger";
        }
        else {
            if($password != $password_confirmation) {
                $msg = "Password and Confirm Password didn't match!";
                $msgClass = "danger";
            } else {
                $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

                $query = "UPDATE login SET email = '$email', password = '$password' WHERE login_id ='$id'";

                $result = mysqli_query($connection,$query);

                if(!$result) {
                    echo 'Query Update Profile Failed..!';
                    die();
                } else {
                    $msg = "Profile Updated Successfully!";
                    $msgClass = "success";
                }

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Login | GICCL</title>
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
    <?php include 'header.php'; ?> <!-- header ends -->
    <!-- contact section -->
    <section id="contact" class="pd_top">
        <div class="container">
            <h2 class="text-center font-weight-bold mt-3 mb-3">Update Login Details</h2>
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
                    <form action="update_profile.php" method="post">
                        <div class="form-group">
                            <label for="email">New Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                          </div>
                        <div class="form-group">
                          <label for="password">New Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o mr-2"></i>Change</button>
                      </form>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->

    <script src="app.js"></script>
</body>
</html>
