<?php
session_start();
include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>ABC Restaurant</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
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

    <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

 

</head>
<body class="host_version"> 
<form action="Menu.php" method="POST">

   

<!-- Start header -->

	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
                <div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
                   
						<li class="nav-item "><a class="nav-link text-dark" href="home.php">Home</a></li>    
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
	<!-- End header -->
 

            <div class="section-title row text-center bg-light">
                <div class="row">
                <div class="col-8">
                    <h3 class="text-primary">Our Menu</h3>
                    <table  class="table-primary rounded" width='100%' bordercolor="white">
                    <?php 
                    if(isset($_POST['btnSearch']))
                    {
                        $txtData=$_POST['txtData'];
                        $select="SELECT * FROM Menu 
                                 WHERE MenuName LIKE '%%$txtData%%' 
                                 OR Price='$txtData'";
                        $query=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($query);
                        for($i=0;$i<$count;$i+=3)
                        {
                           $select1="SELECT * FROM Menu 
                                    WHERE MenuName LIKE '%%$txtData%%' 
                                    OR Price='$txtData'
                                    LIMIT $i,3";
                           $query1=mysqli_query($connect,$select1);
                           $count1=mysqli_num_rows($query1);
                          echo"<tr>";
                           for ($x=0; $x < $count1; $x++) 
                           { 
                              $array=mysqli_fetch_array($query);
                              $MenuID=$array['MenuID'];
                              $MenuName=$array['MenuName'];
                              $Price=$array['Price'];
                              $Des=$array['Description'];
                              $MenuImage1=$array['MenuImage1'];
   
                              list($width,$height)=getimagesize($MenuImage1);
                              $w=$width/2;
                              $h=$height/2;
                              ?>
                              <td>
                           
                            
   
   <div class="card mb-3 m-4 bg-light" style="max-width:540px; ">
     <div class="row g-0">
       <div class="col-md-8 d-flex m-4">
         <img src="<?php echo $MenuImage1 ?>" class="img-fluid rounded-start border border-primary" >
         <div class="col-md-2 mt-5"> 
         <a href="Menu_Details.php?MenuID=<?php echo $MenuID?>" class=" btn btn-secondary">Details</a>
         </div>
       </div>
       <div class="col-md-12">
         <div class="card-body">
           <p class="card-title text-primary fw-bold fs-1"><?php echo $MenuName?></p>
           <p class="card-text"><?php echo $Des ?></</p>
           <p class="card-text text-nowrap bg-light border"><b class="fs-2 text-success"><?php echo $Price?></b><span class="text-success">$ per Piece</span></p>
         </div>
       </div>
     </div>
   </div>
   
                                 
                           </td>
   
                         <?php
                           }
                           echo "</tr>";
                        }

                    }

                    
                    else
                    {
                        $select="SELECT * FROM Menu";
                        $query=mysqli_query($connect,$select);
                        $count=mysqli_num_rows($query);
                        for($i=0;$i<$count;$i+=3)
                        {
                           $select1="SELECT * FROM Menu LIMIT $i,3";
                           $query1=mysqli_query($connect,$select1);
                           $count1=mysqli_num_rows($query1);
                          echo"<tr>";
                           for ($x=0; $x < $count1; $x++) 
                           { 
                              $array=mysqli_fetch_array($query);
                              $MenuID=$array['MenuID'];
                              $MenuName=$array['MenuName'];
                              $Price=$array['Price'];
                              $Des=$array['Description'];
                              $MenuImage1=$array['MenuImage1'];
   
                              list($width,$height)=getimagesize($MenuImage1);
                              $w=$width/2;
                              $h=$height/2;
                              ?>
                              <td>
                           
                            
   
   <div class="card mb-3 m-4 bg-light" style="max-width:540px; ">
     <div class="row g-0">
       <div class="col-md-8 d-flex m-4">
         <img src="<?php echo $MenuImage1 ?>" class="img-fluid rounded-start border border-primary" >
         <div class="col-md-2 mt-5"> 
         <a href="Menu_Details.php?MenuID=<?php echo $MenuID?>" class=" btn btn-secondary">Details</a>
         </div>
       </div>
       <div class="col-md-12">
         <div class="card-body">
           <p class="card-title text-primary fw-bold fs-1"><?php echo $MenuName?></p>
           <p class="card-text"><?php echo $Des ?></</p>
           <p class="card-text text-nowrap bg-light border"><b class="fs-2 text-success"><?php echo $Price?></b><span class="text-success">$ per Piece</span></p>
         </div>
       </div>
     </div>
   </div>
   
                                 
                           </td>
   
                         <?php
                           }
                           echo "</tr>";
                        }

                    }

                  ?>
                    </table>
                </div>
                <div class="col-4">
                    <br/>
                <h3 class="text-dark">Logged In As <span class="text-primary"><?php echo $_SESSION['Name']?> </span></h3>
                    <div class="card text-center mt-5">
                     
  <div class="card-header ">
   <p class="text-warning">Please Check Your Information </p>
  </div>
  <div class="card-body">
    <h3 class="text-primary"> Welcome <span><?php echo $_SESSION['Name']?> </span></h3>
    <img src="<?php echo  $_SESSION['Profile']?>" class="card-img" alt="...">
    <h2 class="card-title fs-1 py-3">Your Current Email is <span class="text-primary"><?php echo $_SESSION['Email']?></span></h2>
    <h2 class="card-text fs-1 py-3">Your Contact Number is <span class="text-primary"><?php echo $_SESSION['Phone']?><span></h2>
    <a href='Booking.php' class="btn btn-primary">Click To Make A Booking</a>
    <a href='customer_logout.php' class="btn btn-danger">Log Out </a>
  </div>
  <div class="card-footer text-muted">
    <h2 class="text-info fs-2"> Date - <?php echo date('Y-m-d') ?><h2>
  </div>
</div>
                </div>
                
                </div>
                
            </div><!-- end title -->
           
            

    <footer class="footer bg-light">
        <div class="container ">
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
                            <li><a href="about.php" class="text-dark">About Us</a></li>
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


    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
	
  
  
    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
  
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
     
    </form>
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