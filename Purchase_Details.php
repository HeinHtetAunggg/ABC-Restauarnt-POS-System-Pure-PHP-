<?php
session_start();
include('connect.php');
include('AutoID_Functions.php');
include('Purchase_Functions.php');

if(isset($_POST['btnConfirm']))
{
    $txtPurchaseID=$_POST['txtPurchaseID'];
    
    $queryforupdate=mysqli_query($connect,"SELECT * FROM PurchaseDetails WHERE PurchaseID='$txtPurchaseID' ");

    while($array=mysqli_fetch_array($queryforupdate))
    {
          $FoodProductID=$array['FoodProductID'];
          $Quantity=$array['Quantity'];

          $UpdateQuan="UPDATE FoodProduct
                       SET Quantity= Quantity + '$Quantity'
                       WHERE FoodProductID='$FoodProductID'";
         $query=mysqli_query($connect,$UpdateQuan);
    }

    $UpdateStatus="UPDATE Purchase
                   SET Status='Confirmed'
                   WHERE PurchaseID='$txtPurchaseID'";
    $query=mysqli_query($connect,$UpdateStatus);


if($query)
{
    echo"<script>window.alert('Successfully Confirmed')</script>";
    echo "<script>window.location='Purchase_Search.php'</script>";
}
else{
    echo"<p>Something went Wrong in Purchase Confirmation Process" .mysqli_error($connect). "</p>";
}
}

$PurchaseID=$_GET['PurchaseID'];


$select="SELECT pur.*,st.StaffID,st.StaffName,sup.SupplierID,sup.SupplierName
         FROM Purchase pur, Staff st, Supplier sup
         WHERE pur.PurchaseID='$PurchaseID' 
         AND pur.StaffID=st. StaffID
         AND pur.SupplierID=sup.SupplierID";
$query=mysqli_query($connect,$select);
$array=mysqli_fetch_array($query);


$select1="SELECT pur.*,purd.*,fpd.FoodProductID,fpd.ProductName
          FROM Purchase pur,PurchaseDetails purd, FoodProduct fpd
          WHERE pur.PurchaseID='$PurchaseID'
          AND pur.PurchaseID=purd.PurchaseID
          AND purd.FoodProductID=fpd.FoodProductID";
$query1=mysqli_query($connect,$select1);
$count=mysqli_num_rows($query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Details</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <form action='Purchase_Details.php'  method="POST">
       <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
            <table class="table table-primary">
             <thead>
              <tr>
                      <th scope="col">PurchaseID</th>
                      <th scope="col">Status</th>
                      <th scope="col">SupplierName</th>
                      <th scope="col">StaffName</th>
                      <th scope="col">Purchase Date :</th>
                      <th scope="col">Report Date :</th>
             </tr>
            </thead>
            <tbody>
                <td>
                    <?php echo $array['PurchaseID'] ?>
                </td>
                <td>
                    <?php echo $array['Status'] ?>
                </td>
                <td>
                    <?php echo $array['SupplierName'] ?>
                </td>
                <td>
                    <?php echo $array['StaffName'] ?>
                </td>
                <td>
                    <?php echo $array['PurchaseDate'] ?>
                </td>
                <td>
                    <?php echo date('Y-m-d') ?>
                </td>
            </tbody>
            </table>
                

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1 text-dark fs-3">Confirmation voucher</p>
                    <p class="mb-0 text-primary">You have <?php echo $count?> items in your voucher</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Date :</span> <span 
                        class="text-primary"> <?php echo date('Y-m-d') ?><i class="fas fa-angle-down mt-1"></i></span></p>
                  </div>
                </div>

                <?php
              for ($i=0; $i < $count; $i++) { 
                $array1=mysqli_fetch_array($query1)
              ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="ms-3">
                          <h5><?php echo $array1['ProductName']?></h5>
                          <p class="large mb-0">Product ID : <?php echo $array1['FoodProductID']?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0 "><?php echo $array1['Quantity']?></h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$<?php echo $array1['Price']?></h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
            }
                ?>

               

              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0 fs-2">Voucher Details</h5>
                      <img src="images/barcode.jpg"
                        class="img-fluid rounded-3" style="width: 50px; height:50px;" alt="Avatar">
                    </div>


                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total Quantity</p>
                      <p class="mb-2">$<?php echo $array['TotalQuantity']?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Total Amount</p>
                      <p class="mb-2">$<?php echo $array['TotalAmount']?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">VAT</p>
                      <p class="mb-2">$<?php echo $array['VAT']?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Grand Total</p>
                      <p class="mb-2">$<?php echo $array['GrandTotal']?></p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex ">
                        <input type="hidden" name="txtPurchaseID" value="<?php echo $array['PurchaseID']?>"/>
                        <?php
                        if($array['Status']=='Pending')
                        {
                            echo"<input type='submit' class='bg-info border border-info' name='btnConfirm' value='Confirmed'/>";
                        }
                        else{
                             echo "<input type='submit'  class='bg-info border border-info' name='btnConfirm' value='Confirmed' disabled/>";
                        }

                     ?>
                      </div>
                    </button>

                   

                  </div>            
                </div>
                <a class="btn btn-danger mt-3" href='Purchase_Search.php'>Go Back</a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </form>
    <script src="main.js"></script>
</body>
</html>