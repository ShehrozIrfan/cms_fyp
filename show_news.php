<?php include 'session.php' ?>
<?php
    //Showing all news
    $msg = '';
    $msgClass = '';
    $query = "SELECT * FROM news ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }//else {
    //     echo "News captured successfully!";
    // }
?>
<?php
//Delete news
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query_d = "DELETE FROM news WHERE id = $id";
    $result_d = mysqli_query($connection, $query_d);
    if(!$result_d) {
        die("Query Failed." . mysqli_error($connection));
    } else {
        $msg = "News deleted successfully!";
        $msgClass = "success";
    }
}
?>
<?php
//Update news
$updated = false;
if(isset($_GET['edit'])) {
    $updated = true;
    $id = $_GET['edit'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All News | GICCL</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
    <div class="container">
            <h2 class="text-center font-weight-bold mt-3 mb-3">All News</h2>
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12 col-xs-12">
                <?php if($msg != '') { ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                        ×
                    </button>
                    <?php echo $msg ?>
                    </div>
                <?php } ?>
                <?php
                while ($row = mysqli_fetch_array($result)) { ?>
                    <table class="table table-bordered">
                   <tr class="thead-dark">
                        <th><span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span></th>
                    </tr>
                    <tr>
                        <td>
                            <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-show-news"></div>
                        </td>
                    </tr>
                    <tr>
                        <td><h2 class="title-show-news"><?php echo $row['title']; ?></h2></td>
                    </tr>
                    <tr>
                        <td><p class="description-show-news"><?php echo $row['description']; ?></p></td>
                    </tr>
                    <?php if(isset($_SESSION['login_user'])): ?>
                        <tr>
                            <td>
                                <a href="show_news.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o mr-2"></i>Delete</a>
                                <a href="create_news.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil mr-2"></i>Edit</a>
                            </td>
                        </tr>
                    <?php endif ?>
                   </table>
                <?php } ?>
                </div>
            </div>
        </div>
    </section><!-- section create news ends -->

    <script src="app.js"></script>
</body>
</html>
