<?php include 'session.php' ?>
<?php
if(isset($_SESSION['login_user']))
{
  header("location: index.php");
}
?>
<?php
$msg = '';
$msgClass = '';
if(isset($_POST['contact'])) {
    //getting values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($message))) {
        //checking for valid email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "Please use a valid email";
            $msgClass = "alert-danger";
        } else {
            //send email
            $toEmail = "shehrozirfan89@gmail.com";
            $subject = "Contact request from " . $name;
            $body = '<h2>Contact Request</h2>
                     <h4>Name: </h4><p>' . $name . '</p>
                     <h4>Email: </h4><p>' . $email . '</p>
                     <h4>Message: </h4><p>' . $message . '</p>
            ';
            //Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
            //Additional headers
            $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";
            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = "Your message has been sent";
                $msgClass = "alert-success";
            } else {
                $msg = "Your message was not sent";
                $msgClass = "danger";
            }
        }
    } else {
        //Failed
        $msg = "Please fill in all fields";
        $msgClass = "danger";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | GICCL</title>
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
    <?php include 'header.php' ?><!-- header ends -->
    <!-- contact section -->
    <section id="contact" class="pd_top">
        <div class="container">
            <h2 class="text-center font-weight-bold mt-3 mb-3">Get In Touch</h2>
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
                    <form action="./contact.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo isset($_POST['name'])? $name : ''; ?>" required>
                          </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email'])? $email : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message" required><?php echo isset($_POST['message'])? $message : ''; ?></textarea>
                          </div>
                        <button type="submit" name="contact" class="btn btn-dark btn-block">Send Message</button>
                      </form>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item text-center font-weight-bold">Contact Us</li>
                        <li class="list-group-item">
                            <i class="fa fa-map-marker pr-2" aria-hidden="true"></i>Govt. Islamia College, Civil Lines Lahore, Pakistan</li>
                        <li class="list-group-item">
                            <i class="fa fa-phone pr-2" aria-hidden="true"></i>+92-042-99210676-7</li>
                        <li class="list-group-item"><i class="fa fa-rss pr-2" aria-hidden="true"></i>www.giccl.edu.pk</li>
                      </ul>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->

    <?php include 'footer.php' ?>
    <script src="app.js"></script>
</body>
</html>
