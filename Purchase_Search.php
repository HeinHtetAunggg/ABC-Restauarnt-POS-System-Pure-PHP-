<?php
include('connect.php');
if(isset($_POST['btnSearch']))
{
    $rdoSearchType=$_POST['rdoSearchType'];
    if($rdoSearchType == 1)
    {
        $cboPurchaseID=$_POST['cboPurchaseID'];

        $select="SELECT pur.*,st.StaffID,st.StaffName,sup.SupplierID,sup.SupplierName
                FROM Purchase pur,Staff st,Supplier sup
                WHERE pur.PurchaseID='$cboPurchaseID'
                AND pur.StaffID=st.StaffID
                AND pur.SupplierID=sup.SupplierID";
        $query=mysqli_query($connect,$select);

    }
    elseif($rdoSearchType ==2)
    {
      $From=$_POST['txtFrom'];
      $To=$_POST['txtTo'];

      $select="SELECT pur.*,st.StaffID,st.StaffName,sup.SupplierID,sup.SupplierName
              FROM Purchase pur, Staff st, Supplier sup
              WHERE pur.PurchaseDate BETWEEN '$From' AND '$To'
              AND pur.StaffID=st.StaffID
              AND pur.SupplierID=sup.SupplierID";
              $query=mysqli_query($connect,$select);

    }
    elseif($rdoSearchType == 3)
    {
       $cboStatus=$_POST['cboStatus'];

       $select="SELECT pur.*,st.StaffID,st.StaffName,sup.SupplierID,sup.SupplierName
               FROM Purchase pur, Staff st, Supplier sup
              WHERE pur.Status='$cboStatus'
              AND pur.StaffID=st.StaffID
              AND pur.SupplierID=sup.SupplierID";
        $query=mysqli_query($connect,$select);
    }

}

elseif(isset($_POST['btnShowAll']))
{
     $select="SELECT pur.*,st.StaffID,st.StaffName,sp.SupplierID,sp.SupplierName
              FROM Purchase pur, Staff st, Supplier sp
              WHERE pur.StaffID= st.StaffID
              AND  pur.SupplierID=sp.SupplierID ";
    $query=mysqli_query($connect,$select);

}
else
{
    $today=date('Y-m-d');
    $select="SELECT pur.*,st.StaffID,st.StaffName,sp.SupplierID,sp.SupplierName
            FROM Purchase pur, Staff st, Supplier sp
            WHERE pur.PurchaseDate='$today'
            AND pur.StaffID=st.StaffID
            AND pur.SupplierID=sp.SupplierID";
   $query=mysqli_query($connect,$select);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Search</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="mt-3 d-md-flex justify-content-md-start">
          <a href="Purchase.php" class="btn btn-primary me-md-4">Go Back</a>
</div>
    <form action="Purchase_Search.php" method="POST">
         <div class="psearchcontainer">
        
          <div class="psearchsection">        
    <div class="container text-start">
  <div class="row align-items-start">
    <div class="col mt-3">

    
   
          <div class="form-check">
  <input class="form-check-input" type="radio" name="rdoSearchType" value="1" >
  <label class="form-check-label" >
    Search By ID
  </label>
</div>
       
    <select class="form-select" name="cboPurchaseID" aria-label="Default select example" >
  <option selected>Choose Purchase ID</option>
     <?php
          $Pselect="SELECT * FROM Purchase";
          $query1=mysqli_query($connect,$Pselect);
          $count1=mysqli_num_rows($query1);

          for ($i=0; $i < $count1; $i++) 
          { 
            $array=mysqli_fetch_array($query1);
            $PurchaseID=$array['PurchaseID'];
            echo "<option value='$PurchaseID'>".$PurchaseID."</option>";
          }
     ?>
</select>
</div>

<div class="col mt-2">  
          <div class="form-check">
  <input class="form-check-input" type="radio" name="rdoSearchType" value="2">
  <label class="form-check-label" for="flexRadioDefault2">
    Search By Date
  </label>
</div>
<div class="row justify-content-evenly">

 <div class="col-6"><b >From </b> <input type="date" name='txtFrom' class="form-control" value="<?php echo date('Y-m-d')?>"/></div>
 <div class="col-6"><b >To </b> <input type="date" name='txtTo' class="form-control" value="<?php echo date('Y-m-d')?>"/></div>
</div>

</div>

<div class="col mt-3">
   
          <div class="form-check">
  <input class="form-check-input" type="radio" name="rdoSearchType" value="3">
  <label class="form-check-label">
    Search By Status
  </label>
</div>
       
    <select class="form-select" name="cboStatus" aria-label="Default select example">
  <option selected>Choose Status</option>
  <option >Pending</option>
  <option>Confirmed</option>
</select>
</div>

<div class="col mt-3 p-3">
   <input type="submit" class="btn btn-outline-primary m-2" name="btnSearch" value="Search">
   <input type="submit"  class="btn btn-outline-secondary m-2" name="btnShowAll" value="Showall">
   <input type="reset"  class="btn btn-outline-danger m-2" name="btnSearch" value="Cancel">
</div>

</div>
</div>
<hr/>
<?php
  $count=mysqli_num_rows($query);

  if($count <1)
  {
      echo "<p>No record Found</p>";
  }
  else
  {
    ?>
        <table class="table table-primary table-striped mt-2">
             <thead class="text-dark">
                <th class="col">PurchaseID</th>
                <th class="col">PurchaseDate</th>
                <th class="col">Supplier Name</th>
                <th class="col">Staff Name</th>
                <th class="col">Total Qty</th>
                <th class="col">Total Amount</th>
                <th class="col">VAT</th>
                <th class="col">Grand Total</th>
                <th class="col">Status</th>
                <th class="col">Action</th>
             </thead>

<?php
  }
  for ($i=0; $i < $count; $i++) 
  { 
     $array=mysqli_fetch_array($query);
     $PurID=$array['PurchaseID'];
     $PurDate=$array['PurchaseDate'];
     $SuppName=$array['SupplierName'];
     $StaffName=$array['StaffName'];
     $TotalQuan=$array['TotalQuantity'];
     $TotalAmount=$array['TotalAmount'];
     $VAT=$array['VAT'];
     $GrandTotal=$array['GrandTotal'];
     $Status=$array['Status'];
  
?>
<tr>
               <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $PurID?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $PurDate?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $SuppName?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $StaffName?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $TotalQuan?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $TotalAmount?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $VAT?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$<?php echo $GrandTotal?></p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?php echo $Status?></p>
                </td>
                <td class="align-middle">
                  <a class="btn btn-outline-primary" href="Purchase_Details.php?PurchaseID=<?php echo $PurID?>">Details</a>
                </td>
</tr>
<?php
  }
?>
    

        </table>
</div>
    </div>
</body>
</html>