<?php include 'session.php'; ?>
<?php
  if(isset($_SESSION['login_user'])) {
    header('location: dashboard.php');
    die();
  }
?>
<?php
    //Getting top 3 news
    $msg = '';
    $msgClass = '';
    $row;
    $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>

<?php
  //Getting news id from post call from js
  // print_r($_POST);
  // $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : null;
  // $query_news = "SELECT * FROM news WHERE id = '$news_id'";
  //   $result_news = mysqli_query($connection, $query_news);
  //   if(!$result_news) {
  //       die("Query Failed .. !" . mysqli_error($connection));
  //   }
  //     $row_news = mysqli_fetch_array($result_news);
  //     print_r($row_news);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GICCL</title>
    <!-- font - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section parallax -->
      <section>
        <div class="header_parallax parallax pd_top text-center">
            <div class="container">
                <div class="header_parallax_text">
                  <div>
                    <h2 class="">Welcome to College Management System - GICCL</h2>
                    <?php if(!isset($_SESSION['login_user'])): ?>
                      <a href="about.php" class="btn btn-dark">Read more</a>
                    <?php endif ?>
                  </div>
                </div>
            </div>
        </div>
    </section><!-- section parallax ends-->

    <!-- section ms -->
    <section id="ms_boxes">
      <h2 class="text-center">College Management</h2>
      <div class="container">
        <div class="row justify-content-center row_ms">
          <div class="col-md-4 box_ms b_1">
            <a href="#">
              <div class="ms_img_1 ms_img_div">
              </div>
            </a>
              <div class="overlay"><h4 class="text-center text"><a href="#">Manage Accounts</a></h4></div>
              <h4 class="text-center">Account Management</h4>
          </div>
          <div class="col-md-4 box_ms b_1">
            <a href="#">
              <div class="ms_img_2 ms_img_div">
              </div>
            </a>
            <div class="overlay"><h4 class="text-center text"><a href="#">Manage Admissions</a></h4></div>
            <h4 class="text-center">Admission Management</h4>
          </div>
          <div class="col-md-4 box_ms b_1">
            <a href="#">
              <div class="ms_img_3 ms_img_div">
              </div>
            </a>
            <div class="overlay"><h4 class="text-center text"><a href="#">Manage Attendance</a></h4></div>
            <h4 class="text-center">Attendance Management</h4>
          </div>
        </div>
        <div class="row justify-content-center row_ms">
          <div class="col-md-4 box_ms b_1">
            <a href="#">
              <div class="ms_img_4 ms_img_div">
              </div>
            </a>
            <div class="overlay"><h4 class="text-center text"><a href="#">Manage Examinations</a></h4></div>
            <h4 class="text-center">Examination Management</h4>
          </div>
          <div class="col-md-4 box_ms b_1">
            <a href="#">
              <div class="ms_img_5 ms_img_div">
              </div>
            </a>
            <div class="overlay"><h4 class="text-center text"><a href="#">Manage Hostel</a></h4></div>
            <h4 class="text-center">Hostel Management</h4>
          </div>
        </div>
      </div>
    </section><!-- section ms ends -->

    <!-- section news-->
    <section id="s_news">
      <h2 class="text-center">News &amp; Updates</h2>
      <div class="container">
          <div class="row justify-content-center">
            <?php while($row = mysqli_fetch_array($result)) { ?>
              <div class="col-md-4 col-sm-12 col-xs-12 index-news" >
                <div>
                  <div>
                    <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-index-news"></div>
                    <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                    <span class="date-index-news">Posted on <?php echo $row['date']; ?></span>
                  </div>
                  <a class="btn btn-warning btn-sm btn-index-news" news-id= "<?php echo $row['id'] ?>">Read <i class="fa fa-chevron-circle-right ml-1" news-id= "<?php echo $row['id'] ?>"></i></a>
                </div>
              </div>
            <?php } ?>
          </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="text-center mt-3 mb-3">
              <a href="./show_news.php" class="btn btn-dark btn-block">Click Here To View All</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- section news ends -->


    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="modals.js"></script>
</body>
</html>
