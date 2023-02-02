<?php 
session_start();
include('connect.php');

if(isset($_POST['btnsave']))
{
    $EventName=$_POST['eventname'];
    $StaffID=$_SESSION['StaffID'];
    $select="SELECT * FROM SpecialEvents where EventName='$EventName'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count >0)
    {
       echo "<script>window.alert('Event Name Already Been Registered')</script>";
       echo"<script>window.location='EventRegister.php'</script>";    
    }
    else{
        $insert="INSERT INTO SpecialEvents(EventName,StaffID)
                VALUES ('$EventName','$StaffID')";
        $query=mysqli_query($connect,$insert);
    }
    if($query)
    {
        echo"<script>window.alert('Successfully Registered')</script>";
        echo"<script>window.location='EventRegister.php'</script>";
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Register Form</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <form action="EventRegister.php" method="POST"  enctype="multipart/form-data">
    <section class="100%" style="background-color: #2779e2;">
  <div class="container vh-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-white mb-4">Event Registration</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
                <div class="d-flex justify-content-between">
            <h4 class='text-primary'>Registered By - <span><?php echo $_SESSION['StaffName']?></span></h4>
            <a href="Staff_Logout.php"  class="btn btn-danger mb-2  ">Log Out</a>
                </div>
             <hr/>
              <div class="col-md-3 ps-5">

              

                <h6 class="mb-0">Event Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name='eventname' class="form-control form-control-lg" required/>

              </div>
            </div>
   
            <div class="px-5 py-4">
              <button type="submit" name='btnsave' class="btn btn-primary btn-lg">Save</button>
              <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>


    </form>
</body>
</html>