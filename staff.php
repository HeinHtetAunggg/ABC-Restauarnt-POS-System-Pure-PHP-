<?php
include ('connect.php');
if(isset($_POST['btnsave']))
{
    $staffname=$_POST['txtname'];
    $gender=$_POST['gender'];
    $phone=$_POST['txtphone'];
    $email=$_POST['txtemail'];
    $password=$_POST['txtpassword'];
    $address=$_POST['txtaddress'];

    $image=$_FILES['txtprofile']['name'];
    $folder="images/";

    $filename=$folder.'_'.$image;
    $image=copy($_FILES['txtprofile']['tmp_name'],$filename);

    if(!$image)
    {
        echo"<script>window.alert('Cannot Upload Your Profile Image')</script>";
        exit();
    }
    $select="SELECT *FROM staff where Email='$email'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count>0)
    {
        echo"<script>window.alert('Your Email is Already Existed!! Registration Fail')</script>";
    }
    else{
        $insert="INSERT INTO staff(StaffName,Gender,Phone,Email,Password,Address,Profile)
                      values('$staffname','$gender','$phone','$email','$password','$address','$filename')";
        $query=mysqli_query($connect,$insert);

        if($query)
        {
            echo"<script>alert('Registration is successful')</script>";
            echo"<script>window.location='staff.php'</script>";
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
    <title>Staff Register</title>
    <link href="style.css" rel="stylesheet">
    

</head>
<body>
<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
  <a class="btn btn-primary me-md-4" href="Staff_Login.php" type="button">Log In</a>
</div> -->
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-primary">ABC Restauarnt</a>
    <form class="d-flex" role="search">
      <a class="btn btn-primary" href="Staff_Login.php">Log In</a>
    </form>
  </div>
</nav>



    <div class="container"> 
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Staff Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="staff.php" method="POST" enctype="multipart/form-data"  >
  <div class="mb-3">
    <label for="StaffName" class="form-label">Staff Name</label>
    <input type="text" name="txtname" class="form-control"  required>
  </div>
  <hr/>

  <div class="mb-3">
    
   <p> Gender</p>
    <label for="male" class="form-label" >Male</label>
    <input type="radio"   value="Male" name="gender" >

    <label for="female" class="form-label">Female</label>
    <input type="radio"  value="Female" name="gender">
  </div>
  <hr/>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="phone" class="form-control" name="txtphone" required>
  </div>
  <hr/>

  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control" name="txtemail" required>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="password" class="form-label">Password(Min: 8 characters)</label>
    <input type="password" class="form-control" name="txtpassword" minlength="8" required>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="address" class="form-control" name="txtaddress" required>
  </div>
  <hr/>

  <div class="mb-3">
    <label  class="form-label">Profile</label>
    <input type="file" class="form-control" name="txtprofile" required>
  </div>
  <hr/>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" name="btnsave" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Cancel</button>

  <a href="staffinfo.php">Detail Information>></a>
 </form>
            </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>