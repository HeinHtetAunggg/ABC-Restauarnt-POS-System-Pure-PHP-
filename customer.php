<?php
include('connect.php');

if(isset($_POST['btnsave']))
{
  $Name=$_POST['txtname'];
  $Email=$_POST['txtemail'];
  $Password=$_POST['txtpassword'];
  $Phone=$_POST['txtphone'];
  $Address=$_POST['txtaddress'];
  
  $image=$_FILES['txtprofile']['name'];
  $folder='images/';

  $filename=$folder.'_'.$image;
  $image=copy($_FILES['txtprofile']['tmp_name'],$filename);

  if(!$image)
  {
    echo"<p>Cannot Upload Image</p>";
  }

  $select="SELECT * FROM Customer WHERE Email='$Email'";
  $query=mysqli_query($connect,$select);
  $count=mysqli_num_rows($query);

  if($count >0)
  {
    echo"<script>window.alert('Email Already Existed')</script>";
  }
  else{
    $insert="INSERT INTO Customer(Name,Email,Password,Phone,Address,Profile)
            VALUES('$Name','$Email','$Password','$Phone','$Address','$filename')";
      $query=mysqli_query($connect,$insert);

      if($query)
      {
        echo"<script>window.alert('Successfully Saved')</script>";
        // echo"<script>window.location='customer.php'</script>";
      }
      else{
        echo"<script>Something went wrong in". mysqli_error($connect) ."</script>"; 
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
    <title>Customer Register Register</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <form action="customer.php" method="POST" enctype="multipart/form-data">
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-primary">ABC Restauarnt</a>
    <form class="d-flex" role="search">
      <a class="btn btn-primary" href="customer_login.php">Log In</a>
    </form>
  </div>
</nav>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Customer Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="customer.php" method="POST" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="custname" class="form-label">Name</label>
    <input type="text" name="txtname" class="form-control"  required>
  </div>

  
  <div class="mb-3">
    <label for="custemail" class="form-label">Email</label>
    <input type="email" name="txtemail" class="form-control"  required>
  </div>

  
  <div class="mb-3">
    <label for="custpass" class="form-label">Password <b>(minimum: 8 character)</b></label>
    <input type="password" name="txtpassword" class="form-control" minlength="8"  required>
  </div>


  
  <div class="mb-3">
    <label for="custphone" class="form-label">Phone</label>
    <input type="number" name="txtphone" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label for="custaddress" class="form-label">Address</label>
    <input type="text" name="txtaddress" class="form-control"  required>
  </div>

  
  <div class="mb-3">
    <label for="profile" class="form-label">Profile</label>
    <input type="file" name="txtprofile" class="form-control" >
  </div>
  
  <button type="submit" name='btnsave' class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Cancel</button>
 </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>