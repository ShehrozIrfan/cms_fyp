<?php include 'connection.php' ?>
<?php 
if(isset($_POST['login'])) {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = md5(mysqli_real_escape_string($connection,$_POST['password'])); 
    $query = "INSERT INTO login(username, password) ";
    $query .= "VALUES('$username','$password')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
       echo 'Success';
    }    
}
?>

