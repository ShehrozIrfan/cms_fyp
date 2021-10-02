<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
    <header>
        <!-- nav-bar -->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="assets/images/main_logo.jpeg" id="main_logo" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-5">
                  <a class="nav-link" href="index.php"><i class="fa fa-home pr-2"></i>Home</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-tasks mr-2"></i>Management
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Accounts Management</a>
                    <a class="dropdown-item" href="#">Admission Management</a>
                    <a class="dropdown-item" href="#">Attendance Management</a>
                    <a class="dropdown-item" href="#">Examination Management</a>
                    <a class="dropdown-item" href="#">Hostel Management</a>
                    </div>
                </li><!-- Dropdown ends -->
                <?php if(!isset($_SESSION['login_user'])): ?>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="about.php"><i class="fa fa-book mr-2"></i>About</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="contact.php"><i class="fa fa-envelope mr-2"></i>Contact</a>
                  </li>
                <?php endif ?>
                  <?php  if(!isset($_SESSION['login_user'])) { ?>
                    <li class="nav-item mr-5">
                    <a class="nav-link" href="signup.php" id="loginBtn"><i class="fa fa-user-plus mr-2"></i>Sign up</a>
                    </li>
                    <li class="nav-item mr-5">
                    <a class="nav-link" href="login.php" id="loginBtn"><i class="fa fa-sign-in mr-2"></i>Login</a>
                    </li>
                  <?php } else {  ?>
                    <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-newspaper-o mr-2"></i>News
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="create_news.php">Post News</a>
                    <a class="dropdown-item" href="show_news.php">Show News</a>
                    </div>
                    </li><!-- Dropdown ends -->
                    <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-cogs mr-2"></i>Settings
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="update_profile.php">Update Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                    </li><!-- Dropdown ends -->
                  <?php } ?>

              </ul>
            </div>
          </nav><!-- navbar ends -->
    </header><!-- header ends -->

    <script>
    </script>
</body>
</html>
