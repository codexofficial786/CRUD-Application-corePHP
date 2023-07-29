<?php
include "db.php";

$edit = $_GET['edit'];

$sql = "SELECT * FROM users WHERE id = '$edit';";
$query = mysqli_query($con, $sql);
$i = 1;
if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($query)) {
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Operation in core PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">CRUD Operation</h1>
        <form action="<?php echo "edit.php?edit=".$edit?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Full Name *</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1"
                    value="<?php echo $row['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Contact *</label>
                <input type="text" name="contact" class="form-control" id="exampleInputNumber1"
                    value="<?php echo $row['contact'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address *</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    value="<?php echo $row['email'] ?>" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputCity1" class="form-label">City *</label>
                <input type="text" name="city" class="form-control" id="exampleInputCity1"
                    value="<?php echo $row['city'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <br><br>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4b774d9826.js" crossorigin="anonymous"></script>
</body>

</html>

<?php 
$i = $i + 1;
}
} else {
    echo "0 results";
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    
    $sql = "UPDATE `users` SET `name`='$name',`contact`='$contact',`email`='$email',`city`='$city' WHERE id = '$edit' ";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "<script> alert (' Data Updated '); 
        window.location.replace('index.php');
        </script>";
    } else {
        echo "error";
    }
}
?>
