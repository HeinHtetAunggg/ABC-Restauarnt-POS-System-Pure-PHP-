<?php  
session_start();
include('connect.php');
include('ShoppingCart_Functions.php');


if(isset($_GET['action'])) 
{
	$action=$_GET['action'];

	if($action == "remove") 
	{
		$MenuID=$_GET['MenuID'];

		RemoveProduct($MenuID);
	}
	elseif($action == "clearAll")
	{
		ClearAll();
	}
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
<body>
<form action="Shopping_Cart.php" method="post">
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

<?php
if(!isset($_SESSION['Shopping_Cart']))
{
	echo"<p>Empty Cart</p>";
	echo"<a href='Menu.php'>Go Back To Menu</p>";
}
else
{
?>
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - <?php echo count(($_SESSION['Shopping_Cart']))?> items</h5>
          </div>
		  <div class="card-body">
            <!-- Single item -->
		
         
				<?php
				$size=count($_SESSION['Shopping_Cart']);
                  for ($i=0; $i <$size; $i++) { 
					  $MenuID=$_SESSION['Shopping_Cart'][$i]['MenuID'];
					  $MenuImage1=$_SESSION['Shopping_Cart'][$i]['MenuImage1'];
					  $MenuName=$_SESSION['Shopping_Cart'][$i]['MenuName'];
		              $Price=$_SESSION['Shopping_Cart'][$i]['Price'];
		              $BuyQuantity=$_SESSION['Shopping_Cart'][$i]['Quantity'];

		              $SubTotal=$Price * $BuyQuantity;
					  $VAT=$SubTotal * 0.05;
					?>
				<div class="row">
				 <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
             
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="<?php echo $MenuImage1?>"
                    class="w-100"/>
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong><?php echo $MenuName ?></strong></p>
                <p>MenuID:<span><?php echo $MenuID?></span></p>
                <a class="btn btn-danger " href="Shopping_Cart.php?action=remove&MenuID=<?php echo $MenuID?>">Remove</a>
                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  

                  <div class="form-outline">
                    <input id="form1" min="0" name="quantity" value="<?php echo $BuyQuantity?>" type="number" class="form-control" />
                    <label class="form-label" for="form1">Quantity</label>
                  </div>

                 
                </div>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <strong>$ - <?php echo $Price?></strong>
                </p>
                <!-- Price -->


				
              </div>
			  </div>
			  
			  <hr class="my-4" />
			  
       
      
	   <?php
		}
	}

		?>
		 </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>We accept</strong></p>
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
              alt="American Express" />
            <img class="me-2" width="45px"
              src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
              alt="Mastercard" />
			  <a class="btn btn-primary ml-4"href="Menu.php">Continue Shopping</a>
			  <a class="btn btn-danger ml-4"href="Shopping_Cart.php?action=clearAll">Empty Cart</a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card mb-8">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Total Items
                <span><?php echo $size ?></span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(Tax Not Included)</p>
                  </strong>
                </div>
                <span><strong>$ -<?php echo CalculateTotalAmount()?></strong></span>
              </li>
            </ul>

            <a href="checkout.php" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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