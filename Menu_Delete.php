<?php
include('connect.php');
$MenuID=$_GET['MenuID'];

$Delete="DELETE FROM Menu WHERE MenuID='$MenuID'";
$query=mysqli_query($connect,$Delete);

if($query)
{
    echo "<script>window.alert('Successfully Deleted')</script>";
    echo "<script>window.location='Menuinfo.php'</script>";
}
else{
    echo "<script>Something went wrong" .mysqli_error($connect). "</script>";
}




?>