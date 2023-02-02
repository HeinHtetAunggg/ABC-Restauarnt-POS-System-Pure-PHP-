<?php

include('connect.php');
if(isset($_POST['txtsave']))
{
  $productName=$_POST['txtproductname'];
  $cboCategoryID=$_POST['cboCategoryID'];
  $productprice=$_POST['txtproductprice'];
  $productquan=$_POST['txtproductquan'];
  $des=$_POST['txtdes'];

  $image1=$_FILES['pdimage1']['name'];
  $folder="images/";

  $filename=$folder.'_'.$image1;
  $image1=copy($_FILES['pdimage1']['tmp_name'],$filename);

  if(!$image1)
  {
    echo"<p>Cannot Upload Product Image 1</p>";
    exit();
  }

  $image2=$_FILES['pdimage2']['name'];
  $folder="images/";

  $filename2=$folder.'_'.$image2;
  $image2=copy($_FILES['pdimage2']['tmp_name'],$filename2);
  
  if(!$image2)
  {
    echo"<p>Cannot Upload Product Image 2</p>";
    exit();
  }

$select="SELECT * FROM FoodProduct WHERE ProductName='$productName'";
$query=mysqli_query($connect,$select);
$count=mysqli_num_rows($query);

if($count> 0)
{
  echo"<script>window.alert('ProductName $productName Already Exist.')</script>";
  echo"<script>window.location='foodproduct.php'</script>";
}
else{
  $insert="INSERT INTO FoodProduct(ProductName,CategoryID,Price,Quantity,Image,Image2,Description)
           VALUES('$productName','$cboCategoryID','$productprice','$productquan','$filename','$filename2','$des')";
      $query=mysqli_query($connect,$insert);
}

if($query)
{
  echo"<script>window.alert('Successfully Save!')</script>";
  echo"<script>window.location='foodproduct.php'</script>";
}
else{
  echo"<p>Something Went Wrong In Entering Food Product</p>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Food Product Registration</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Food Product Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="foodproduct.php" method="POST" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="productname" class="form-label">Product Name</label>
    <input type="text" name="txtproductname" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label class="form-label">Category</label>
     <select name="cboCategoryID"  class="form-control">
     <option >Choose Category ID</option>
     <?php
         $select="SELECT * FROM Category";
         $query=mysqli_query($connect,$select);
         $count=mysqli_num_rows($query);

         for ($i=0; $i < $count; $i++) 
         { 
            $array=mysqli_fetch_array($query);
            $CategoryID=$array['CategoryID'];
            $CategoryName=$array['CategoryName'];

            echo"<option value='$CategoryID'>$CategoryID - $CategoryName</option>";
         }


     ?>
     </select>
  </div>

  <div class="mb-3">
    <label for="productprice" class="form-label">Price</label>
    <input type="number" name="txtproductprice" class="form-control"  required>
  </div>
  
  <div class="mb-3">
    <label for="productquan" class="form-label">Qunaity</label>
    <input type="text" name="txtproductquan" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label class="form-label">Image 1</label>
    <input type="file" name="pdimage1" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label class="form-label">Image 2</label>
    <input type="file" name="pdimage2" class="form-control"  required>
  </div>

  <div class="mb-3">
    <label class="form-label">Product Description</label>
    <textarea name="txtdes" id="" cols="20" rows="5" class="form-control"></textarea>
  </div>

 
  <button type="submit" name="txtsave" class="btn btn-primary">Save</button>
  <button type="reset" class="btn btn-danger">Cancel</button>
 </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>