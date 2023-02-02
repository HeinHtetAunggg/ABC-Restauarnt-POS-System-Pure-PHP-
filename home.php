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

     <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
						<li class="nav-item "><a class="nav-link text-dark" href="about.php">About Us</a></li>
                        <li class="nav-item "><a class="nav-link text-dark" href="contact.php">Contact</a></li>
                        <li class="nav-item "><a class="nav-link text-dark " href="Countdown.php">Our Future</a></li>
                        
					</ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="customer_logout.php" class=" btn btn-outline-danger"> Log Out</a></li>
                    </ul>
		
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1" ></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/mainbackground.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2>Welcome <strong class='text-primary'><?php echo $_SESSION ['Name']?> </strong> </h2>
										<p class="lead">Slide More To Make Order Or Table Booking </p>
						
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/orderback2.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h2>Make <strong data-animation="animated zoomInRight" class="text-primary">Order</strong>Here</h2>
										<p class="lead" data-animation="animated fadeInLeft">Fresh Foods and Drinks are on the way!! </p>
											<a href="Menu.php" class="hover-btn-new"><span>Order Now</span></a>
	
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/bookingback.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong class="text-primary">Book </strong>Here </h2>
										<p class="lead" data-animation="animated fadeInLeft">Make A Booking To Fulfill Your Lovely Day</p>
											<a href="Booking.php" class="hover-btn-new"><span>Book Now</span></a>
											
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev bg-primary" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next bg-primary" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
         				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
            
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4 class="text-primary">2018 BEST SmartEDU education school</h4>
                        <h2>Welcome to ABC Restaurant</h2>
                        <p>Our Restaurant has been founded in 2010 by the man called Steve.</p>

                        <p> The restaurant was first opened with only 5 items on the menu: burgers, sandwiches, puffs, pudding, and some drinks. In 2010 </p>

                        <a href="#" class="btn btn-primary"><span>Learn More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/oldABC.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/oldMenu.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>Very First 5 Menu Items</h2>
                        <p>Burgers, Sandwiches, Puffs, Pudding, and Some Drinks</p>

                        <p> Cheese Burger, Tuna Sandwich, Mutton Puff, Chocolate Pudding, And Milkshake were the most popluar ones back then</p>

                        <a href="#" class="btn btn-primary"><span>Learn More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

  

	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12 bg-primary">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">7000</p>
					<h3>Worldwide Customers</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12 bg-primary">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="fa-solid fa-utensils"></i></span>
					<p class="stat_count">8</p>
					<h3>Branches</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12 bg-primary">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
					<p class="stat_count">12</p>
					<h3>Years Of Success</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

    <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Current Popular Dish</h3>
                
            </div><!-- end title -->



            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <img src="images/porkribs.jpg" alt="" style="width:200px; height:200px;">
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa-solid fa-file-signature"></i> <strong>Pork Ribs</strong></p>
                                            <p><i class="fa fa-dollar"></i><strong>$ 17</strong></p>
                                            <p><i class="fa-solid fa-person"></i> <strong>For 1 people</strong></p>
                                
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="menu.php" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                        <img src="images/______menubeef.jpg" alt="" style="width:200px; height:200px;">
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                        <p><i class="fa-solid fa-file-signature"></i> <strong>Beef Steak</strong></p>
                                            <p><i class="fa fa-dollar"></i> <strong>$ 25</strong></p>
                                            <p><i class="fa-solid fa-person"></i> <strong>For 1 people</strong></p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="menu.php" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                        <img src="images/_soup.jpg" alt="" style="width:200px; height:200px;">
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                        <p><i class="fa-solid fa-file-signature"></i> <strong>Chicken&Corn Soup</strong></p>
                                            <p><i class="fa fa-dollar"></i> <strong>$ 14</strong></p>
                                            <p><i class="fa-solid fa-person"></i> <strong>For 1 people</strong></p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="menu.php" class="hover-btn-new orange"><span>Order Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->

                       
                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->


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

    <div class="copyrights bg-secondary">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name text-dark">All Rights Reserved. &copy; 2023 <a href="#" >ABC Restaurant</a> Design By : <b class="text-white">Hein Htet Aung</b></p>
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
    <script src="main.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>