<?php
session_start();
include('connect.php');
include('AutoID_Functions.php');
include('Purchase_Functions.php');

if(isset($_POST['btnBuy']))
{
    $txtPurchaseID=$_POST['txtPurchaseID'];
    $txtPurchaseDate=date('Y-m-d');
    $StaffID=$_SESSION['StaffID'];
    $SupplierID=$_POST['cboSupplierID'];
    $TotalQuantity=$_POST['txtTotalQuan'];
    $TotalAmount=$_POST['txtTotalAmount'];
    $VAT=$_POST['txtVAT'];
    $GrandTotal=$_POST['txtGrandTotal'];
    $Additional=$_POST['txtextra'];
    $Status='Pending';
    
    $insert="INSERT INTO Purchase(PurchaseID,PurchaseDate,StaffID,SupplierID,TotalQuantity,TotalAmount,VAT,GrandTotal,Additional,Status)
             VALUES('$txtPurchaseID','$txtPurchaseDate','$StaffID','$SupplierID','$TotalQuantity','$TotalAmount','$VAT','$GrandTotal','$Additional','$Status')";
   $query=mysqli_query($connect,$insert);
            
    $count=count($_SESSION['Purchase_Functions']);
    
    for ($i=0; $i < $count; $i++) { 

       $FPID=$_SESSION['Purchase_Functions'][$i]['FoodProductID'];
       $Price=$_SESSION['Purchase_Functions'][$i]['Price'];
       $Quan=$_SESSION['Purchase_Functions'][$i]['Quantity'];
    $insert2="INSERT INTO PurchaseDetails(PurchaseID,FoodProductID,Price,Quantity)
              VALUES ('$txtPurchaseID','$FPID','$Price','$Quan')";
              $query=mysqli_query($connect,$insert2);
    }
    if($query)
    {
      unset($_SESSION['Purchase_Functions']);
      echo"<script>window.alert('Successfully Purchased')</script>";
      echo"<script>window.location='Staff_Home.php'</script>";
    }
    else{
      echo "<p>Something Went Wrong in Purchase " . mysqli_error($connect) .  "</p>";
    }

}


if(isset($_GET['action']))
{
   $action=$_GET['action'];
   if($action =="remove")
   {
    $FoodProductID=$_GET['FoodProductID'];
    Remove($FoodProductID);
   }
   elseif($_GET['action']=='ClearAll')
   {
      ClearAll();
   }
}

if(isset($_POST['btnAdd']))
{
  $FoodProductID=$_POST['cboFoodProductID'];
  $PurchaseQuantity=$_POST['txtPurchaseQuantity'];
  $PurchasePrice=$_POST['txtPurchasePrice'];
  AddProduct($FoodProductID,$PurchaseQuantity,$PurchasePrice);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Form</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="mt-3 d-md-flex justify-content-md-end">
<a href="Purchase_Search.php" class="btn btn-primary me-md-4">Search Purchase...</a>
  <a href="Staff_Logout.php" class="btn btn-danger me-md-4">Log out</a>
</div>

<form action="Purchase.php" method="POST"  enctype="multipart/form-data" class="row g-3 mx-auto mt-4 pt-3" style="width:80%;" >

<div class="row">
<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Staff Name - <p class="btn btn-primary"><?php echo $_SESSION['StaffName']?></p></h5>
        <br/>
        <h5 class="card-title">Purchase ID -<input type="text" name="txtPurchaseID" value="<?php echo AutoID('Purchase','PurchaseID','PUR-',6) ?>" class="border border-primary rounded" readonly /> </h5>
            <br/> 
            <div class="mb-3">
  <h5 class="form-label">For Extra Message</h5>
  <textarea class="form-control" name='txtextra' rows="3"></textarea>
</div>
      </div>
    </div>
  </div>
 
  
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Select Product <br><br><select name="cboFoodProductID" class="form-select" >
  <option selected>Choose Product Name....</option>
  <?php
  $select="SELECT * FROM FoodProduct";
  $query=mysqli_query($connect,$select);
  $count=mysqli_num_rows($query);

  for ($i=0; $i <$count ; $i++) { 
     $array=mysqli_fetch_array($query);
     $FoodProductID=$array['FoodProductID'];
     $ProductName=$array['ProductName'];

     echo"<option value='$FoodProductID'>$FoodProductID - $ProductName</option>";
  }

  ?>
</select></h5>
<hr/>

    
<hr/>
<div class="row g-2 align-items-center">
<div class="col-auto">
    <label for="purprice" class="col-form-label">Purchasing Price</label>
  </div>
  <div class="col-md-2">
    <input type="number" name="txtPurchasePrice" class="form-control" aria-describedby="passwordHelpInline" >
  </div>
  <div class="col-md-1">
    <span class="d-flex">USD</span>
  </div>
  <div class="col-auto ">
    <b class="m-2">|</b> 
 </div>
  <div class="col-auto">
    <label for="purquan" class="col-form-label">Purchasing Quantity</label>
  </div>
  <div class="col-md-2">
    <input type="number" name="txtPurchaseQuantity" class="form-control" aria-describedby="passwordHelpInline" >
  </div>
  <div class="col-md-1">
    <span class="d-flex">PCS</span>
  </div>
  <div class="d-flex gap-2 justify-content-center">
  <input type="submit" class="btn btn-primary btn-lg " name='btnAdd' value="Add">
    <a href="#" class="btn btn-danger btn-lg">Cancel</a>
    
  </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="card text-center">
  <div class="card-header text-muted">
    <h4 >Cost Lists</h4>
  </div>

  <div class="card-body">
  <div class="input-group input-group-lg">
  <span class="input-group-text">$</span>
  <input type="text" name="txtTotalAmount"   value="<?php echo CalculateTotalAmount(); ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly/>
</div>
<br/>
<div class="input-group input-group-lg">
  <input type="text" name="txtTotalQuan" value="<?= CalculateTotalQuantity()?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
  <span class="input-group-text">PCS</span>
</div>
<br/>
<div class="input-group input-group-lg">
  <span class="input-group-text">VAT (5%)</span>
  <input type="text" name="txtVAT"   value="<?= VAT() ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
  <span class="input-group-text">$</span>
</div>
<br/>
<div class="input-group input-group-lg">
  <span class="input-group-text">Grand Total</span>
  <input type="text" name="txtGrandTotal"   value="<?= GrandTotal() ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" readonly>
  <span class="input-group-text">$</span>
</div>
<br/>
<h5 class="card-title"><span class="text-primary text-uppercase">Select Supplier</span><br><br><select name="cboSupplierID" class="form-select" aria-label="Default select example"></h5>
    <option selected>Choose Supplier...</option>
    <?php
   $select="SELECT * FROM Supplier";
   $query=mysqli_query($connect,$select);
   $count=mysqli_num_rows($query);

   for ($i=0; $i <$count; $i++) { 
    $array=mysqli_fetch_array($query);
    $SupplierID=$array['SupplierID'];
    $SupplierName=$array['SupplierName'];

    echo"<option value='$SupplierID'>$SupplierID - $SupplierName</option>";
   }

?>
</select></h5>
    <p class="card-text text-warning">Please check carefully before clicking on the add button</p>
    <input type="submit" name="btnBuy"  value="Buy" class="btn btn-primary btn-lg">
    <a class="btn btn-danger btn-lg">Cancel</a>
    <a href="Purchase.php?action=ClearAll" class="btn btn-outline-info">Clear All</a>
  </div>
  <div class="card-footer text-muted">
  <h5><b>Purchasing Date - </b><span name="txtPurchaseDate" class="btn btn-outline-primary"><?php echo date('Y-m-d')?></span></h5>
  </div>
</div>
<?php
if(!isset($_SESSION['Purchase_Functions']))
{
  echo"<p>No record Found!</p>";
  exit();
}
else
{
  ?>
 <div class="table-responsive">
          <table class="table">
            <thead class="text-info bg-dark">
              <tr>
                <th scope="col" class="h4"> List</th>
                <th scope="col" class="fs-5">Product-ID</th>
                <th scope="col" class="fs-5">Quantity</th>
                <th scope="col" class="fs-5">Price</th>
                <th scope="col" class="fs-5">Sub-Total</th>
                <th scope="col" class="fs-5"></th>
              </tr>
            </thead>


<?php
  $count=count($_SESSION['Purchase_Functions']);
  for ($i=0; $i <$count ; $i++) { 
    $ProductImage=$_SESSION['Purchase_Functions'][$i]['Image'];
    $ProductID=$_SESSION['Purchase_Functions'][$i]['FoodProductID'];
    $ProductName=$_SESSION['Purchase_Functions'][$i]['ProductName'];
    $PurchasePrice=$_SESSION['Purchase_Functions'][$i]['Price'];
    $PurchaseQuantity=$_SESSION['Purchase_Functions'][$i]['Quantity'];

    $SubTotal=$PurchasePrice * $PurchaseQuantity;
  ?>

<tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="<?php echo $ProductImage?>" class="img-fluid rounded-3"
                      style="width: 200px; height:120px;"  alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2 text-info fs-5"><?php echo $ProductName?></p>
                    </div>
                  </div>
                </th>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $ProductID ?></p>
                </td>
                <td class="align-middle">
                  <div class="d-flex flex-row">

                    <input id="form1" min="0" name="quantity" value="<?php echo $PurchaseQuantity?>" 
                      class="form-control form-control-sm" style="width: 50px;" readonly/>
                  </div>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $PurchasePrice?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $SubTotal?></p>
                </td>
                <td class="align-middle">
                  <a class="btn btn-danger" href="Purchase.php?action=remove&FoodProductID=<?php echo $ProductID?>">Remove</a>
                </td>
              </tr>

  <?php
  }
}

?>

</table>
</div>
</form>
</body>
</html>