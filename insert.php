<?php 
include "db.php";

if(isset($_POST['submit'])){
    // echo "hello";
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $sql = "INSERT INTO `users`(`id`, `name`, `contact`, `email`, `city`) VALUES ('','$name','$contact','$email','$city')";
    $query = mysqli_query($con, $sql);
    if($query){
        echo "<script> alert (' data inserted '); 
        window.location.replace('index.php');
        </script>";
    }

}

?>