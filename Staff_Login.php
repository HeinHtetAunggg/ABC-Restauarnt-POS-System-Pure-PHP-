<?php
session_start();
include('connect.php');
if(isset($_POST['txtlogin']))
{
    $email=$_POST['txtemail'];
    $password=$_POST['txtpassword'];

    $select="SELECT * FROM Staff Where Email='$email' AND Password='$password'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count>0)
    {
        $array=mysqli_fetch_array($query);
        $_SESSION['StaffID']=$array['StaffID'];
        $_SESSION['StaffName']=$array['StaffName'];
        $_SESSION['Phone']=$array['Phone'];
        $_SESSION['Email']=$array['Email'];
        $_SESSION['Address']=$array['Address'];
        $_SESSION['Profile']=$array['Profile'];
        $_SESSION['Time']=$array['Time'];
     

        echo"<script> window.alert('Log In Successful')</script>";
        echo"<script>window.location='Staff_Home.php'</script>";
    }
    else{
        echo"<script>window.alert('Email and Password Do Not Match')</script>";
        echo"<script>window.location='Staff_Login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stafff Log In</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<form action="Staff_Login.php" method="POST" >
    <div class="login_main_container">    
    <div class="login_container">
    <h2 class="text-primary fs-1">Staff Log In</h2>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" name="txtemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 for_eye_container">
    <label  class="form-label">Password</label>
    <input type="password" name="txtpassword" class="form-control" id="password">
    <i class="fas fa-eye-slash" id="eye"></i>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" >Remember Me</label>
  </div>
  <button type="submit" name="txtlogin" class="btn btn-primary">Log In</button>
  <a href="staff.php" class="btn btn-link">Sign Up</a>
  <a href="#" class="btn btn-link">Forgot Password?</a>
  </div>
</div>
</form>
<script src="main.js"></script>
</body>
</html>