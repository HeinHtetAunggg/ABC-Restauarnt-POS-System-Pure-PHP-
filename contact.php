<?php 
session_start();
include('connect.php');
include('BookingAutoID_Functions.php');

if(isset($_POST['txtContact']))
{
    $SpecialID=$_POST['txtspecialID'];
    $CustomerID=$_SESSION['CustomerID'];
    $EventID=$_POST['cboEventID'];
    $Email=$_POST['txtemail'];
    $Phone=$_POST['txtphone'];
    $Date=$_POST['txtdate'];
    $Time=$_POST['txttime'];
    $Guests=$_POST['txtguest'];
    $Additional=$_POST['txtadditional'];
    
$select="SELECT * FROM SpecialContact WHERE EventDate='$Date'";
$query=mysqli_query($connect,$select);
$count=mysqli_num_rows($query);

if($count>0){
    echo"<script>window.alert('The day you selected has already been reserved')</script>";
    echo"<script>window.location='contact.php'</script>";
}else{
$insert="INSERT INTO SpecialContact(SpecialID,CustomerID,EventID,Email,Phone,EventDate,EventTime,Guest,Additional)
         VALUES('$SpecialID','$CustomerID','$EventID','$Email','$Phone','$Date','$Time','$Guests','$Additional')";
$query=mysqli_query($connect,$insert);
if($query)
{
    echo"<script>window.alert('You Special Request Has Successfully Accepted')</script>";
    echo"<script>window.location='contact.php'</script>";
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
    <title>Speical Contact Form</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
</head>
<body>
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
                <div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link text-dark" href="home.php">Home</a></li>
						<li class="nav-item "><a class="nav-link text-dark" href="about.php">About Us</a></li>
                        <li class="nav-item "><a class="nav-link text-primary" href="contact.php">Contact</a></li>
                        <li class="nav-item "><a class="nav-link text-dark" href="Countdown.php">Our Future</a></li>
					</ul>
                     <ul class="nav navbar-nav navbar-right">
                        <li><a href="customer_logout.php" class=" btn btn-outline-danger"> Log Out</a></li>
                    </ul>
		
				</div>

				</div>
		</nav>
	</header>
    <form action="contact.php" method="POST" enctype="multipart/form-data">
    <div  class="specialcontact">
        <div class="container">       
            <div class="section-title text-center pt-2">
                <h3 classs="pt-2 text-primary">Wanna Celebrate Event?</h3>
                <p class="lead text-dark">Let us give you the best service. Please fill out the form below. Our team is ready to serve the best service for you.</p>
            </div><!-- end title -->

            <div class="row py-3">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="contact_form bg-white">
                        <form id="contactform" class="" action="contact.php" name="contactform" method="POST">
                            <div class="row row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="forBookingID m-4">
            <h3 class="text-dark">Your Specail Event ID is - <input type="text" class="p-3 m-2 bg-primary text-white rounded-pill" name="txtspecialID" value="<?php echo BookingAutoID('SpecialContact','SpecialID','SC-',4) ?>" style="width:125px"></h3>
             </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <select name="cboEventID" class="form-control rounded-pill text-dark border border-primary" aria-label="Default select example">
  <option selected>Drop To Select Events</option>
  <?php
  $select="SELECT * FROM SpecialEvents";
  $query=mysqli_query($connect,$select);
  $count=mysqli_num_rows($query);

  for ($i=0; $i < $count; $i++) { 
    $array=mysqli_fetch_array($query);
    $EventID=$array['EventID'];
    $EventName=$array['EventName'];
    echo"<option value='$EventID'>$EventID - $EventName</option>";
  }

?>
</div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                    <input type="email" name="txtemail" id="email" class="form-control text-dark border border-primary" placeholder="Your Email" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                        
                                    <input type="number" name="txtphone" id="phone" class="form-control text-dark border border-primary" placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="date" class="form-control text-dark border border-primary" name="txtdate" placeholder="Enter Date and Time" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="time" class="form-control text-dark border border-primary" name="txttime" placeholder="Enter Date and Time" required>
                                </div>
                        
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="numberofguests" class="fs-2"><h2 class="text-primary">How many number of guests will come?</h2></label>
                                   <input type="number" name="txtguest" class="form-control text-dark border border-primary">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control text-dark border border-primary" name="txtadditional" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <tr>
               

             <div>
                 <input  class="Agree" type='checkbox' name='reading' required>
                <lable for='reading'><strong style="color:dark;">I Have Read And Understand The Gym Rules And Agree To TheThe<b><a class="text-primary" href="https://policies.google.com/">Terms Of Policy</a></b></strong></lable>
               
            </div>
                                <div class="text-center mt-3">
                                    <button type="submit" name='txtContact'  id="submit" class="btn btn-primary">Contact Now</button>
                                </div>
                            </div>

                       <!--  </form> -->
                    </div>
                </div><!-- end col -->
				<div class="col-xl-6 col-md-12 col-sm-12">

					<div class="map-box ml-1">
						<!-- <div id="custom-places" class="small-map"></div> -->
						<div class="mapouter"><div class="gmap_canvas"><iframe width="800" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:751px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:751px;}</style></div></div>
					</div>
                    <div class="card text-center mt-3" style="width:757px;">
  <div class="card-header">
    <h4 class="text-primary">Customer Special Service</h4>
  </div>
  <div class="card-body">
    <h3 class="card-title fs-1">You are Logged In as <b class="text-primary"><?php echo $_SESSION['Name']?></b></h3>
    <h4 class="card-text">As Support, our organization has offered you some weather app to visit to our restauarnt at a perfect time. The app can forecast one day weather condition.</h4>
    <a href="awa.html" class="btn btn-primary">Go To WeatherApp</a>
  </div>
  <div class="card-footer text-muted">
    Current Date -<b class="text-primary"><?php echo date('Y-m-d') ?></b>
  </div>
</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    </form>
 
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 class="text-primary">About US</h3>
                        </div>
                        <p class="text-dark">You can contact us with different types of social media platform</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook text-primary"></i></a></li>
								<li><a href="#"><i class="fa fa-github text-dark"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" style="color:lightblue;"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest text-danger"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 class="text-primary">Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="home.php" class="text-dark">Home</a></li>
                            <li><a href="about.php" class="text-primary">About Us</a></li>
                            <li><a href="contact.php" class="text-dark">Contact</a></li>
							<li><a href="Countdonw.php" class="text-dark">Our Future</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 class="text-primary">Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#" class="text-dark">ABCRestaurant@gmail.com</a></li>
                            <li><a href="#" class="text-dark">www.ABCRestaurant.com</a></li>
                            <li class="text-dark">Main Restaurant-112 York Street,Yangon, Myanmar</li>
                            <li class="text-dark">+95 987 654 321</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
                       

</body>
</html>