<?php include('session.php'); ?>
<?php
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .container-custom {
            width: 80%;
            margin-left: auto;
            margin-right: 50px;
        }
        @media(max-width: 992px) {
            .container-custom {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <div class="pd_top"></div>
    <div class="container-custom">
        <div class="row justify-content-center mt-5 mb-3">
            <div class="col-md-12 text-center">
                <div class="jumbotron">
                    <h1>Welcome to CMS</h1>
                    <p>This is the welcome page for CMS, Govt. Islamia Graduate College, Civil Lines, Lahore. You can manage Accounts, Admissions, Attendances, Examinations, Hostel from this single platform.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>
