<?php 
session_start();
include('connect.php');
include('OrderAutoID_Functions.php');
include('ShoppingCart_Functions.php');

if(isset($_POST['btncheckout']))
{
    $OrderID=$_POST['txtorderid'];
    $Date=$_POST['txtdate'];
    $CustomerID=$_SESSION['CustomerID'];
    $CustomerName=$_SESSION['Name'];
    $TotalQuan=$_POST['txtquan'];
    $TotalAmount=$_POST['txtprice'];
    $VAT=$_POST['txtVAT'];
    $GrandTotal=$_POST['txtGrand'];
    $DeliveryType=$_POST['rdoAddress'];
    $PaymentType=$_POST['rdoPayment'];
    $CardNo=$_POST['txtCardNumber'];

    if($DeliveryType =="SAME")
    {
       $CustomerPhone=$_SESSION['Phone'];
       $CustomerAddress=$_SESSION['Address'];
    }
    else
    {
        $CustomerPhone=$_POST['txtphone'];
        $CustomerAddress=$_POST['txtaddress'];
    }

    $insert1="INSERT INTO Orders(OrderID,OrderDate,CustomerID,CustomerName,TotalQuantity,TotalAmount,VAT,GrandTotal,DeliveryType,Phone,Address,PaymentType,CardNumber)
              VALUES('$OrderID','$Date','$CustomerID','$CustomerName','$TotalQuan','$TotalAmount','$VAT','$GrandTotal','$DeliveryType','$CustomerPhone','$CustomerAddress','$PaymentType','$CardNo')";
    $query=mysqli_query($connect,$insert1);

    $count=count($_SESSION['Shopping_Cart']);

    for ($i=0; $i < $count; $i++) { 
    $MenuID=$_SESSION['Shopping_Cart'][$i]['MenuID'];
    $Price=$_SESSION['Shopping_Cart'][$i]['Price'];
    $Quantity=$_SESSION['Shopping_Cart'][$i]['Quantity'];

    $insert2="INSERT INTO OrderDetails(OrderID,MenuID,Price,Quantity)
              VALUES ('$OrderID','$MenuID','$Price','$Quantity')";
    $query=mysqli_query($connect,$insert2);

    $update="UPDATE Menu
             SET Quantity=Quantity -'$Quantity'
              WHERE 
              MenuID='$MenuID'";
          $query=mysqli_query($connect,$update);
    }
    if($query)
    {
        unset($_SESSION['Shopping_Cart']);
        echo"<script>window.alert('Successfully Checkout')</script>";
        echo "<script>window.location='home.php'</script>";
    }
    else{
        echo "<p>Something Went Wrong in Checkout " . mysqli_error($connection) .  "</p>";
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <script>
        function showPaymentTable()
        {
            document.getElementById('CardPayment').style.visibility='visible';
        }
        function hidePaymentTable()
        {
            document.getElementById('CardPayment').style.visibility='hidden';
        }

        function showAddress()
        {
            document.getElementById('AddressTable').style.visibility='visible';
        }

        function hideAddress()
        {
            document.getElementById('AddressTable').style.visibility='hidden';
        }
     </script>
</head>
<body>
<form action="checkout.php" method="POST"  enctype="multipart/form-data">
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.jpg" alt="" width="170" height="70"/>
				</a>
                <div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
                        <li class="nav-item" ><a class="nav-link text-dark" href="home.php">Home</a></li>
                         <li class="nav-item" ><a class="nav-link text-dark" href="home.php">Contact</a></li>
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
    <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
            <div class="py-4 d-flex flex-row">
              <h5><span class="far fa-check-square pe-2 text-primary"></span><b>ABC Restaurant</b> |</h5>
              <span class="ps-2">Checkout</span>
            </div>
            <h4>Ordered By- <b class="text-primary"><?php echo $_SESSION['Name']?></b></h4>
           
            <p>
              Voucher details will be sent to <b class="text-primary"><?php echo $_SESSION['Email']?></b>. Please check your Email after checking out.
            </p>
            <div class="rounded d-flex" style="background-color: #f8f9fa;">
          <input type="date" name="txtdate" class="form-control border border-light text-center text-primary" value="<?php echo date('Y-m-d'); ?>" readonly/>
            </div>
            <hr />
            <div class="pt-2">
            <h4 class="text-primary">Delivery Address</h4>
              <div class="d-flex flex-row pb-3 m-3 justify-content-between">
                  <div class="d-flex align-items-center pe-2">
                    <input class="form-check-input" type="radio" name="rdoAddress" id="radioNoLabel1"
                      value="OTHER" onclick="showAddress()" checked />
                  </div>
                  <div class="rounded border d-flex w-30 p-3 align-items-center border border-primary">
                    <p class="mb-0">  
                    <i class="fa-solid fa-map-location text-primary"></i> Other Address
                    </p>
                    
                
                  </div>
                  <div class="d-flex align-items-center pe-2  ">
                    <input class="form-check-input" type="radio" name="rdoAddress" id="radioNoLabel1"
                      value="SAME" onclick="hideAddress()"/>
</div>
                      <div class="rounded border d-flex w-30 p-3 align-items-center border border-success">
                    <p class="mb-0">
                    <i class="fa-solid fa-house text-success"></i> Same Address
                    </p>
                  </div>      
                  </div>
              <div class="AddressTable" id="AddressTable">
                <div class="d-flex justify-content-between">
                <div class="col-4">
                <label for="" class="form-lable mb-2 text-primary">Phone</label>
                <input type="text" name="txtphone" class="form-control ">
                <p class="pt-3">Please enter recipient's phone number.</p>
                </div>
                <div class="col-6">
                <label for="" class="form-lable mb-2 text-primary">Address</label>
                <textarea id="" name="txtaddress" class="form-control" cols="30" rows="5"></textarea>
                </div>
    </div>
              </div>
              <hr class="text-dark">
              <h4 class="text-primary">Payment</h4>
              <p>
                Currently, only VISA debit card and cash are available at the ABC restaurant. Other payment methods are still in progress and the organizaiton will add other payment methods for our customers as soon as possible.
              </p>
              <form class="pb-3">
                <div class="d-flex flex-row pb-3 m-3 justify-content-between">
                  <div class="d-flex align-items-center pe-2">
                    <input class="form-check-input" type="radio" name="rdoPayment" id="radioNoLabel1"
                      value="CARD" onclick="showPaymentTable()" checked />
                  </div>
                  <div class="rounded border d-flex w-30 p-3 align-items-center border border-primary">
                    <p class="mb-0">
                      <i class="fab fa-cc-visa fa-lg text-primary pe-2"></i>Visa Debit
                      Card
                    </p>
                    
                
                  </div>
                  <div class="d-flex align-items-center pe-2 ">
                    <input class="form-check-input" type="radio" name="rdoPayment" id="radioNoLabel1"
                      value="CASH" onclick="hidePaymentTable()"  />
</div>
                      <div class="rounded border d-flex w-30 p-3 align-items-center  border border-success">
                    <p class="mb-0">
                    <i class="fa-solid fa-hand-holding-dollar text-success"></i> Cash On Delivery
                    </p>
                  </div>        
                  </div>
                  <div id="CardPayment" class="mb-3">
                  <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="formNameOnCard" class="form-control" />
                  <label class="form-label text-primary" for="formNameOnCard">Name on card</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="formCardNumber" class="form-control" name="txtCardNumber"/>
                  <label class="form-label text-primary" for="formCardNumber">Credit card number</label>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-3">
                <div class="form-outline">
                  <input type="text" id="formExpiration" class="form-control " placeholder="E.g :05/23"/>
                  <label class="form-label text-primary" for="formExpiration">Expiration</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-outline">
                  <input type="text" id="formCVV" class="form-control " />
                  <label class="form-label text-primary" for="formCVV">C V V</label>
                </div>
              </div>
            </div>


</div>
                
              </form>
             
              <input type="submit" value="Checkout Now" name="btncheckout" class="btn btn-primary btn-block btn-lg" />
              
            </div>
          </div>

          <div class="col-md-5 col-xl-4 offset-xl-1">
            <div class="py-4 d-flex justify-content-end">
              <h6><a href="Menu.php" class="text-info">Continue Shopping</a></h6>
            </div>
            <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
              <div class="p-2 me-3">
                <h4 class="text-primary">Order Summary</h4>
              </div>
              <h5 class="mx-auto"><input type="text" name="txtorderid" class="form-control text-center border border-light text-primary fs-4 bg-light" value="<?php echo OrderAutoID('Orders','OrderID','ORD-',3) ?>"></h5>
              <div class="p-2 d-flex">
            
                <div class="col-8">Total Price</div>
                <span class="input-group-text text-white bg-primary">$</span>
                <input type="text" name="txtprice" class="form-control text-primary" value="<?php echo CalculateTotalAmount()?>" readonly/>
                      
              </div>
              <div class="p-2 d-flex">
                <div class="col-8"> Total Quantity</div>
                <input type="text" name="txtquan" class="form-control text-primary" value="<?php echo CalculateTotalQuantity()?>" readonly/>
                 <span class="input-group-text text-white bg-primary">PCS</span>
              </div>
            
              <div class="border-top px-2 mx-2"></div>
              <div class="p-2 d-flex pt-3">
                <div class="col-8">Value-added tax (VAT)</div>
                <div class="ms-auto"><b>5%</b></div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">
                  VAT Amount
                </div>
                <span class="input-group-text text-white bg-primary">$</span>
                <input type="text" name="txtVAT" class="form-control text-primary" value="<?php echo CalculateTotalAmount() * 0.05?>" readonly/>
                 
              </div>
              <div class="border-top px-2 mx-2"></div>
              <div class="p-2 d-flex pt-3">
                <div class="col-8"><b>Grand Total</b></div>
                <span class="input-group-text text-white bg-success">$</span>
                <input type="text" name="txtGrand" class="form-control text-success" value="<?php echo (CalculateTotalAmount() * 0.05) + CalculateTotalAmount()?>" readonly/>
              </div>
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