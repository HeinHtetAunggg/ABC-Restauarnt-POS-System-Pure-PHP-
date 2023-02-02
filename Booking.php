<?php
session_start();
include('connect.php');
include('BookingAutoID_Functions.php');

if(isset($_POST['txtbook']))
{
    $BookingID=$_POST['txtBookID'];
    $TableID=$_POST['cboTableID'];
    $CusID=$_SESSION['CustomerID'];
    $NOG=$_POST['txtnog'];
    $Date=$_POST['txtdate'];

   $select="SELECT * FROM Bookings WHERE TableID='$TableID'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);
 
    if($count > 0)
    {
       echo "<script>window.alert('Table Already Been Registered')</script>";
        echo "<script>window.location='Booking.php'</script>";
    }
    else{
        $insert="INSERT INTO Bookings(BookingID,TableID,CustomerID,NumberOfGuests,ReservationTime)
                 VALUES('$BookingID','$TableID','$CusID','$NOG','$Date')";
        $query=mysqli_query($connect,$insert);
        if($query)
        {
           echo "<script>window.alert('Successfully Booked')</script>";
           echo  "<script>window.location='home.php'</script>";
        }
        else{
           echo "<script>Something went wrong in". mysqli_error($connect) ."</script";
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
    <title>Booking Form</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<form action="Booking.php" method="POST"  enctype="multipart/form-data">
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbars-host">
					<ul class="navbar-nav ml-auto ">
                        <li class="nav-item" ><a class="nav-link text-dark" href="home.php">Home</a></li>
					</ul>
		
                    </div>

                <div class="search-bar-container active ">          
        <img src="https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/magnifier-256.png" alt="magnifier" class="magnifier">
        <input type="text" class="input" name='txtData' placeholder="Search ....."/>
        <input type="hidden" name='btnSearch' class="btn btn-primary mr-3" value="Search"> 
        <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-25-512.png" alt="mic-icon" class="mic-icon">
            
    </div>
  
				</div>
		</nav>
	</header>
<div class="bookingbackground">  
    <div class="row m-4">
    <div class="col-8">
        <div class="bookingbox">
            <h1 class="p-4 text-primary fst-italic">Booking Form</h1>
            <hr class="text-white">
            <!-- <h3 class="fst-bold text-warning fs-3 p-3">Need to Know</h3> -->
            <h5 class="text-danger fs-3 p-3 ">"Please Read"</h5>
            <p class="text-white fs-4 p-3">Please not that bookings made online are for ABC Restaurants in Myanmar Only. The other countries' online booking services are in developing and maintainance stages. The system can now only book for one table. To make bookings at other place, please contact +95-87654321. ABC Restaurant is happy to serve you and hope you enjoy your lovely day.</p>
            <hr class="text-white">
            <div class="forBookingID m-4">
            <h3 class="text-white">Your Booking Number is - <input type="text" class="p-3 m-2 bg-secondary text-white rounded-pill" name="txtBookID" value="<?php echo BookingAutoID('Bookings','BookingID','B-',4) ?>" style="width:125px"></h3>
            </div>
            <div class="pt-4 m-3" >
           
<br>
<h4 class=" mt-3 text-white">Number Of Guests ( Max 14 people)</h4>
  <input type="number" name='txtnog' class=" inputboooking rounded-pill text-white p-3 bg-dark" min="1" max="14" required>
  <hr class="text-white"  style="height: 10px;">
  <h4 class=" mt-3 text-white">Reservation Date</h4>
  <br>
  <input type="datetime-local" name="txtdate" class="inputboooking rounded-pill text-white p-3 bg-dark" aria-label="Server" required>
  <div class="card-body">
  <p class="card-body"></p>
  <h4 class="text-white ">Select Table Numbers</h4>
 <select name="cboTableID" class=" inputboooking rounded-pill text-white bg-dark" aria-label="Default select example" required>
  <option selected >Drop To Select Tables</option>
  <?php
    $select="SELECT * FROM Tables";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    for ($i=0; $i <$count ; $i++){
        $array=mysqli_fetch_array($query);
        $TableID=$array['TableID'];
        $TableNumber=$array['TableNumber'];
        $Position=$array['Position'];

        echo"<option value='$TableID'>$TableNumber - $Position</option>";
    
    }
  ?>
</select>
<hr style="height:30px;">
  </div>
  <div class="d-flex gap-2 justify-content-center m-4 pb-4">
  <input type="submit" name="txtbook" class="btn btn-primary btn-lg" value="Book">
    <a href="#" class="btn btn-danger btn-lg">Cancel</a>
    
  </div>
        </div>
</div>
    </div>
    <div class="col-4">
 <div class="card text-center mt-5">
                     
  <div class="card-header">
   <p class="text-warning">Please Check Your Information </p>
  </div>
  <div class="card-body">
    <h3 class="text-primary"> Welcome <span><?php echo $_SESSION['Name']?> </span></h3>
    <img src="<?php echo  $_SESSION['Profile']?>" class="card-img" alt="...">
    <h2 class="card-title fs-4 py-3">Your Current Email is <span class="text-primary"><?php echo $_SESSION['Email']?></span></h2>
    <h2 class="card-text fs-4 py-3">Your Contact Number is <span class="text-primary"><?php echo $_SESSION['Phone']?><span></h2>
    <a href='Menu.php' class="btn btn-primary">Click To Make A Order</a>
    <a href='customer_logout.php' class="btn btn-danger">Log Out </a>
  </div>
  <div class="card-footer text-muted">
    <h2 class="text-info fs-4"> Date - <?php echo date('Y-m-d') ?><h2>
  </div>
</div>
    </div>
    </div>

</div>
<script>
        const magnifierEl= document.querySelector(".magnifier");
const searchBarContainerEl=document.querySelector(".search-bar-container");

magnifierEl.addEventListener("click",()=>{
     searchBarContainerEl.classList.toggle("active");
});
    </script>
    </form>
</body>
</html>