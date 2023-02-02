<?php
include('connect.php');
$StaffID=$_GET['StaffID'];

$delete="DELETE FROM Staff WHERE StaffID='$StaffID'";
$query=mysqli_query($connect,$delete);

if($query)
{
    echo"<script>window.alert('Successfully Deleted')</script>";
    echo"<script>window.location='staffinfo.php'</script>";
}
else
{
    echo "<p>Something went wrong" . mysqli_error($connect) ."</p>";
}

?>