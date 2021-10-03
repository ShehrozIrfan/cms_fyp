<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GICCL</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">

    <style>
        #main_logo {
            margin-left: 50px;
        }
        .vertical-navbar-link {
            text-align: center;
        }
        .vertical-navbar-icon {
            display: block;
            font-size: 30px;
        }
        @media (min-width:992px) {
            .vertical-nav {
                position: fixed;
                top: 56px;
                left: 0;
                width: 200px;
                height: 100%;
                background-color: #f8f8f8;
                overflow-y: auto;
                padding-top: 30px
                }
            }
        @media(max-width: 992px) {
            #main_logo {
                margin-left: 0px;
            }
            .vertical-navbar-link {
                text-align: left;
            }
            .vertical-navbar-icon {
                display: inline;
                font-size: 20px;
                padding-right: 10px;
            }
        }
    </style>
</head>
<body>
<!-- header -->
<header>
    <!-- nav-bar -->
    <?php if(!isset($_SESSION['login_user'])){ ?>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
    <?php } else { ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php } ?>
        <a class="navbar-brand" href="index.php"><img src="assets/images/main_logo.jpeg" id="main_logo" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if(isset($_SESSION['login_user'])): ?>
            <ul class="navbar-nav mr-auto flex-column vertical-nav bg-dark mt-4">
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="dashboard.php"><i class="fa fa-home vertical-navbar-icon"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="create_news.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_news.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="update_profile.php"><i class="fa fa-edit vertical-navbar-icon"></i>Update Profile</a>
                </li>
            </ul>
            <?php endif ?>
            <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['login_user'])){ ?>
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

                  <li class="nav-item mr-5">
                    <a class="nav-link" href="about.php"><i class="fa fa-book mr-2"></i>About</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="contact.php"><i class="fa fa-envelope mr-2"></i>Contact</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="signup.php" id="loginBtn"><i class="fa fa-user-plus mr-2"></i>Sign up</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="login.php" id="loginBtn"><i class="fa fa-sign-in mr-2"></i>Login</a>
                  </li>
            <?php } else { ?>
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
                <li class="nav-item dropdown">
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out pr-2"></i>Logout</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </nav>
</header><!-- header ends -->
</body>
</html>
