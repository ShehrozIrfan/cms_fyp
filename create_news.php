<?php include 'session.php'; ?>

<?php
if(!isset($_SESSION['login_user']))
{
  header("location: index.php");
}
?>
<?php
$msg = '';
$msgClass = '';
if(isset($_POST['create'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/news-images/".$filename;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');

    if(!empty(trim($title)) && !empty(trim($description))) {
        if(strlen($title) < 10) {
            $msg = "Title must be atleast 10 characters!";
            $msgClass = "danger";
        }
        else if(strlen($description) < 15) {
            $msg = "Description must be atleast 15 characters!";
            $msgClass = "danger";
        } else {
            $query = "INSERT INTO news (filename,title, description, date) VALUES('$filename','$title', '$description', '$date')";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                die("Query Failed .. !" . mysqli_error($connection));
            }else {
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder))  {
                    $msg = "News posted successfully!";
                    $msgClass = "success";
                    $title = '';
                    $description = '';
                }

            }
        }
    } else {
        $msg = "Title or Description can't be blank";
        $msgClass = "danger";
    }
}
?>
<?php
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $filename;
    $title;
    $description;
    $query = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_array($result)){
            $title = $row['title'];
            $description = $row['description'];
            $filename = $row['filename'];
        }
    }
}
?>
<?php
if(isset($_POST['update'])) {
    $id = $_GET['edit'];
    $filename = $_FILES["uploadImage"]["name"];
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/news-images/".$filename;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE news SET ";
    $query .= "filename = '$filename', ";
    $query .= "title = '$title', ";
    $query .= "description = '$description' ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed. " .  mysqli_error($connection));
    } else {
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "News Updated successfully!";
            $msgClass = "warning";
            $title = '';
            $description = '';
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
    <title>Create News | GICCL</title>
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
    <?php include 'header.php' ?><!--  header ends -->

    <!-- section create news -->
    <section id="create_news" class="pd_top mb-5">
    <div class="container">
            <?php if(isset($_GET['edit'])){ ?>
            <h2 class="text-center font-weight-bold mt-3 mb-3">Update News</h2>
            <?php } else {?>
            <h2 class="text-center font-weight-bold mt-3 mb-3">Post News</h2>
            <?php } ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                <?php if($msg != '') { ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                        ×
                    </button>
                    <?php echo $msg ?>
                    </div>
                <?php } ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" name="uploadImage" value="" class="form-control" required />
                            </div>
                            <label for="title">Title</label>
                            <textarea type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required><?php if(isset($_GET['edit'])) { echo $title; } ?></textarea>
                          </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" required><?php if(isset($_GET['edit'])) { echo $description; } ?></textarea>
                          </div>
                        <?php if(isset($_GET['edit'])): ?>
                        <button type="submit" name="update" class="btn btn-warning">Update News</button>
                        <a href="show_news.php" class="btn btn-secondary ml-3">Back</a>
                        <?php else: ?>
                        <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post News</button>
                        <a href="show_news.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show News</a>
                        <?php endif ?>
                      </form>
                </div>
            </div>
        </div>
    </section><!-- section create news ends -->


    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->
    <script src="app.js"></script>
</body>
</html>
