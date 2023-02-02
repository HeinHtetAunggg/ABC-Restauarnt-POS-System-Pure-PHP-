<?php
include ('connect.php');


if(isset($_POST['btnUpdate']))
{
    $staffid=$_POST['txtStaffID'];
    $staffname=$_POST['txtname'];
    $gender=$_POST['genderstatus'];
    $phone=$_POST['txtphone'];
    $email=$_POST['txtemail'];
    $password=$_POST['txtpassword'];
    $address=$_POST['txtaddress'];
  
        $update="UPDATE staff
                  SET StaffName='$staffname',Gender='$gender',Phone='$phone',Email='$email',Password='$password',Address='$address'
                  WHERE StaffID='$staffid'";
        $query=mysqli_query($connect,$update);

        if($query)
        {
            echo"<script>alert('Successfully Updated')</script>";
            echo"<script>window.location='staff.php'</script>";
        }
        else
        {
            echo"<p> Something went wrong".mysqli_error($connect)."</p>";
        }
    
}

$StaffID=$_GET['StaffID'];
$select="SELECT * FROM Staff WHERE StaffID='$StaffID'";
$query=mysqli_query($connect,$select);
$array=mysqli_fetch_array($query);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Staff Update</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Update Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="Staff_Update.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="StaffName" class="form-label">Staff Name</label>
    <input type="text" name="txtname" class="form-control"  value="<?php echo $array['StaffName']?>" required>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select name="genderstatus">
    <option> <?php echo $array['Gender']?></option>
        <option >Male</option>
        <option >Female</option>
    </select>
</div>
  <hr/>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="phone" class="form-control" name="txtphone" value="<?php echo $array['Phone'] ?>" requried>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="txtemail" value="<?php echo $array['Email'] ?>"  requried>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="passowrd" class="form-label">Password</label>
    <input type="password" class="form-control" name="txtpassword" value="<?php echo $array['Password'] ?>"  requried>
  </div>
  <hr/>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="address" class="form-control" name="txtaddress" value="<?php echo $array['Address'] ?>"  requried>
  </div>
  <hr/>


  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <input type="hidden" name="txtStaffID" value="<?php echo $StaffID ?>">
  <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
  <a class="btn btn-danger" href="staffinfo.php">Go Back</a>
 </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>