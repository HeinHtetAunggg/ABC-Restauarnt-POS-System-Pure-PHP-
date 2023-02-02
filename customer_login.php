<?php
session_start();
include('connect.php');


if(isset($_POST['txtlogin']))
{
   $Email=$_POST['txtemail'];
   $Password=$_POST['txtpassword'];

   $select="SELECT * FROM Customer WHERE Email='$Email' AND Password='$Password'";
   $query=mysqli_query($connect,$select);
   $count=mysqli_num_rows($query);

   if($count >0)
   {
    $array=mysqli_fetch_array($query);
    $_SESSION['CustomerID']=$array['CustomerID'];
    $_SESSION['Name']=$array['Name'];
    $_SESSION['Email']=$array['Email'];
    $_SESSION['Password']=$array['Password'];
    $_SESSION['Phone']=$array['Phone'];
     $_SESSION['Address']=$array['Address'];
     $_SESSION['Profile']=$array['Profile'];
     $_SESSION['Time']=$array['Time'];
   

    
    echo"<script>window.alert('Log In Successful')</script>";
    echo"<script>window.location='home.php'</script>";
   }
   else{
    echo"<script>window.alert('Email and Password Do Not Match')</script>";
    echo "<script>window.location='customer_login.php'</script>";
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class=" btn btn-outline-primary"> Go Back</a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
<form action="customer_login.php" method="POST" >
    <div class="login_main_container">    
    <div class="login_container">
    <h2 class="text-primary fs-1">Customer Log In</h2>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" name="txtemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 for_eye_container">
    <label  class="form-label">Password</label>
    <input type="password" name="txtpassword" class="form-control" id="password" required>
    <i class="fas fa-eye-slash" id="eye"></i>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" >Remember Me</label>
  </div>
  <button type="submit" name="txtlogin" class="btn btn-primary">Log In</button>
  <a href="customer.php" class="btn btn-link">Sign Up</a>
  <a href="#" class="btn btn-link">Forgot Password?</a>
  </div>
</div>
</form>
<script src="main.js"></script>
    
</body>
</html>