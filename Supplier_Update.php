<?php
include('connect.php');
if(isset($_POST['btnupdate']))
{
    $SupplierID=$_POST['txtSuppID'];
    $SuppName=$_POST['txtsuppname'];
    $SuppPhone=$_POST['txtphone'];
    $SuppEmail=$_POST['txtsuppemail'];

    $update="UPDATE Supplier 
                SET SupplierName='$SuppName', Phone='$SuppPhone',Email='$SuppEmail'
              where SupplierID='$SupplierID'";
              $query=mysqli_query($connect,$update);

    if($query)
    {
        echo"<script>window.alert('Update Successfully')</script>";
        echo"<script>window.location='supplierinfo.php'</script>";
    }
    else{
        echo"<p>Something went Wrong!".mysqli_error($connect)."</p>";
    }
}

$SuppID=$_GET['SupplierID'];
$select="SELECT * FROM Supplier Where SupplierID='$SuppID'";
$query=mysqli_query($connect,$select);
$array=mysqli_fetch_array($query)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h3 class="text-primary text-center my-2">Supplier Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
<form action="Supplier_Update.php" method="POST" enctype="multipart/form-data">

  <div class="mb-3">
    <label  class="form-label">Supplier Name</label>
    <input type="text" name="txtsuppname" class="form-control"   value="<?php echo $array['SupplierName'] ?>" required>
  </div>

  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" name="txtsuppemail" class="form-control"   value="<?php echo $array['Email'] ?>" required>
  </div>

  <div class="mb-3">
    <label  class="form-label">Phone</label>
    <input type="number" name="txtphone" class="form-control" value="<?php echo $array['Phone']?>" required>
  </div>
  
  <input type="hidden" name="txtSuppID" value=<?php echo $SuppID?>>
  <button type="submit" name='btnupdate' class="btn btn-primary">Update</button>
  <a class="btn btn-danger" href="supplierinfo.php">Go Back</a>
 </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>