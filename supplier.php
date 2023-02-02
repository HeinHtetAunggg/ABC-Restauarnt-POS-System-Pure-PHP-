<?php
include ('connect.php');

if(isset($_POST['btnsave']))
{
  $suppname=$_POST['txtsuppname'];
  $suppemail=$_POST['txtsuppemail'];
  $suppphone=$_POST['txtphone'];

  $select="SELECT * FROM supplier WHERE Email='$suppemail'";
  $query=mysqli_query($connect,$select);
  $count=mysqli_num_rows($query);

  if($count > 0)
  {
    echo"<script>window.alert('Your Email is Already Existed! Supplier Registration Fail')</script>";
  }
  else{
    $insert="INSERT INTO Supplier (SupplierName,Phone,Email)
                VALUES ('$suppname','$suppphone','$suppemail')";
                $query=mysqli_query($connect,$insert);

    if($query)
    {
      echo"<script>alert('Registraton Successul')</script>";
      echo"<script>window.location='supplier.php'</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Supplier Register</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-primary">ABC Restauarnt</a>
  </div>
</nav>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Supplier Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="supplier.php" method="POST" enctype="multipart/form-data">

  <div class="mb-3">
    <label  class="form-label">Supplier Name</label>
    <input type="text" name="txtsuppname" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" name="txtsuppemail" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label  class="form-label">Phone</label>
    <input type="number" name="txtphone" class="form-control"  required>
  </div>
  
  <button type="submit" name='btnsave' class="btn btn-primary">Save</button>
  <button type="reset" class="btn btn-danger">Cancel</button>
  <a href="supplierinfo.php">Detail Information >></a>
 </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>