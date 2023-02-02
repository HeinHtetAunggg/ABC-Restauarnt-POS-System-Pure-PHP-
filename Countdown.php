<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Restaurant Countdown</title>
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
                        <li class="nav-item "><a class="nav-link text-dark" href="contact.php">Contact</a></li>
                        <li class="nav-item active"><a class="nav-link " href="Countdown.php">Our Future</a></li>
					</ul>
                     <ul class="nav navbar-nav navbar-right">
                        <li><a href="customer_logout.php" class=" btn btn-outline-danger"> Log Out</a></li>
                    </ul>
		
				</div>

				</div>
		</nav>
	</header>
    <div class="countdownwrapper">
        <h1 class="countdowntitle">New Restaurant Opening On</h1>
        <div class="year">1st March 2023</div>
        <div class="timing">
            <div class="days">00</div>
            <div class="hours">00</div>
            <div class="minutes">00</div>
            <div class="seconds">00</div>
        </div>

    </div>
    <script>
        const dayEl=document.querySelector(".days");
        const hourEl=document.querySelector(".hours");
        const minuteEl=document.querySelector(".minutes");
        const secondEl=document.querySelector(".seconds");
      
        const OpeningTime=new Date("March 1 2023 00:00:00").getTime();
        updateTime();
        function updateTime(){
            const now=new Date().getTime();
            const gap= OpeningTime -now;

            const second=1000;
            const minute=second * 60;
            const hour=minute * 60;
            const day=hour * 24;

            const d=Math.floor(gap/day);
            const h=Math.floor((gap%day)/hour);
            const m=Math.floor((gap%hour)/minute);
            const s=Math.floor((gap%minute/second));

            dayEl.innerText=d;
            hourEl.innerText=h;
            minuteEl.innerText=m;
            secondEl.innerText=s;

            setTimeout(updateTime,1000);


        }


    </script>
</body>
</html>