<?php
include ('connect.php');
$SuppID=$_GET['SupplierID'];

$delete="DELETE  FROM Supplier WHERE SupplierID='$SuppID'";
$query=mysqli_query($connect,$delete);

if($query)
{
    echo"<script>alert('Successfully Deleted')</script>";
    echo"<script>window.location='supplierinfo.php'</script>";
}
else{
    echo"<p>Something went wrong".mysqli_error($connect)."</p>";
}
?>