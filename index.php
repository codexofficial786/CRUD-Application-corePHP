<?php include "db.php";?>
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
<div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD Application</a>
        </div>
    </div>
    <div class="container">
        <form action="insert.php" method="post" enctype="multipart/formdata">
            <div class="mb-6">
                <label for="exampleInputName1" class="form-label">Full Name *</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Contact *</label>
                <input type="text" name="contact" class="form-control" id="exampleInputNumber1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address *</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputCity1" class="form-label">City *</label>
                <input type="text" name="city" class="form-control" id="exampleInputCity1" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <input type="button" class="btn btn-primary" onclick="view()" value="View User">
            <br><br>
        </form>
    </div>
<br><br>
    <div class="container" id="view">
    <h2 class="text-center">View Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php 
                    $sql="SELECT * FROM users";
                    $query= mysqli_query($con, $sql);
                    $i=1;
                    if (mysqli_num_rows($query) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($query)) {
                        //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                          echo "<tr> <th scope='row'>". $i."</th><td> " . $row["name"]. "</td><td> " . $row["contact"]. "</td><td> " . $row["email"]. "</td><td> " . $row["city"]. "</td><td><a href='edit.php?edit=".$row["id"]."'><i class='fa-solid fa-pen-to-square'></i></a> <a href='delete.php?delete= " . $row["id"] . " '><i class='fa-solid fa-trash'></i></a> </td></tr>";  
                        $i= $i+1;
                        }
                      } else {
                        echo "0 results";
                      }
                    ?>
            </tbody>
        </table>
        
    </div>
    <br><br><br>

    <script>
        function view() {
            document.getElementById('view').style.display = "block";
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4b774d9826.js" crossorigin="anonymous"></script>
</body>

</html>