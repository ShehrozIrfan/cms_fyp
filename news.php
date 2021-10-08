<?php include 'connection.php' ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM news WHERE id = $id";
$result = mysqli_query($connection, $query);
if(!$result) {
    die("Query Failed." . mysqli_error($connection));
} else {
    $row = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title'] ?></title>
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
    <link rel="stylesheet" href="assets/css/show_news.css">
</head>
<body>
  <div class="specific-news-bg" style="background: url('images/news-images/<?php echo $row['filename']; ?>'); background-position: center; background-size: cover; height: 100vh; opacity: 0.5;"></div>
<!-- Modal -->
<div class="modal fade" id="newsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="font-weight-bold">Posted on <?php echo $row['date']; ?></h6>
      </div>
      <div class="modal-body">
        <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-show-news"></div>
        <h2 class="title-show-news title-news"><?php echo $row['title']; ?></h2>
        <p class="description-show-news description-news"><?php echo $row['description']; ?></p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary">Back</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#newsModal').modal('show');
</script>
<script src="modals.js"></script>
</body>
</html>


