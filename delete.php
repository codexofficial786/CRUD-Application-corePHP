<?php
include "db.php";

$deleteuser = $_GET['delete'];
$sql = "DELETE FROM users WHERE id = '$deleteuser';";
$query = mysqli_query($con, $sql);
if($query){
    echo "<script> alert (' Data deleted '); 
    window.location.replace('index.php');
    </script>";
}


?>