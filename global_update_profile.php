<?php 
require_once 'connection.php';
if(isset($_SESSION)) {

    $query = "SELECT * FROM login";
    $result = mysqli_query($connection, $query);
    if($result) {
        $row = mysqli_fetch_array($result);
        $id = $row['login_id'];
    } else {
        echo "QUERY FAILED...!";
    }
}else {
    header("location: index.php");
}
?>