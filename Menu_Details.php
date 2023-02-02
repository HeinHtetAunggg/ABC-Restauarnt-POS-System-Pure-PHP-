<?php
session_start();
include ('connect.php');
include('ShoppingCart_Functions.php');
if(isset($_POST['btnAdd'])) 
{
	$MenuID=$_POST['txtMenuID'];
	$BuyQuantity=$_POST['txtBuyQty'];

	AddProduct($MenuID,$BuyQuantity);
}
if(isset($_GET['MenuID']))
{

$Menuid=$_GET['MenuID'];

$select="SELECT m.*,c.CategoryID, c.CategoryName
        FROM Menu m, MenuCategory c
        WHERE m.MenuID='$Menuid'
        AND c.CategoryID=m.CategoryID ";

$query=mysqli_query($connect,$select);
$array=mysqli_fetch_array($query);

$MenuID=$array['MenuID'];
$MenuImage1=$array['MenuImage1'];
$MenuImage2=$array['MenuImage2'];


list($width,$height)=getimagesize($MenuImage1);
$w=$width/2;
$h=$height/2;
}
else
{
	echo"<script>Product Not Found</script>";
}
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
<form action="Menu_Details.php" method="POST">

   

<!-- Start header -->

	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
                <div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item "><a class="" href="home.php"><h3>Home</h3></a></li>
                        <li class="nav-item "><a class="home.php" href="index.html"><h3>Contact</h3></a></li>
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
    <div class="MenuDetails_container">
    <div class="card forwhole" style="width: 48rem;">
  <img  id="Mimage" src="<?php echo $MenuImage1 ?>" class="card-img-top rounded p-2" width="300px" height="300px">
  <hr/>
  <div class="For2images">
  <img src="<?php echo $MenuImage1 ?>" class="card-img-top m-2 rounded" width="<?php echo $w?>" height="<?php echo $h?>"
  onClick="document.getElementById('Mimage').src='<?php echo $MenuImage1 ?>'"/>
  <img src="<?php echo $MenuImage2 ?>" class="card-img-top m-2 rounded" width="<?php echo $w?>" height="<?php echo $h?>"
  onClick="document.getElementById('Mimage').src='<?php echo $MenuImage2?>'"/>
  </div>

  <div class="card-body">
    <h2 class="card-title "><strong>Menu Name - <span class="text-primary"><?php echo $array ['MenuName'] ?></span></strong></h2>
    <h3 class="card-text fs-3"><?php echo $array ['Description'] ?></h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><h2 class="fw-2">Price - <span class="text-primary">$ <?php echo $array['Price']?><span></h2></li>
    <li class="list-group-item"><h2 class="fw-2">Available Quantity - <span class="text-primary"><?php echo $array['Quantity']?><span></h2></li>
  </ul>
  <div class="input-group mb-3">
  <span class="input-group-text text-primary">Buy Amount</span>
  <input type="hidden" name="txtMenuID" value="<?php echo $array['MenuID'] ?>" />
  <input type="text" class="form-control"  name='txtBuyQty' value='1'>
  
</div>

  <input class="btn btn-primary p-2" type="submit" value="Buy" name="btnAdd">

<br/>
</div>
</div>

                       
         

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Pricing</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

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