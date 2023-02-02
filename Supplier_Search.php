<?php
include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching Supplier</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
</head>
<body>
<script>
$(document).ready
( function ()
{
   $('#tableid').DataTable();
   
}
);
</script>
<form action="Supplier_Search.php" method="POST">
    <?php
    $select="SELECT * FROM Supplier";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count<1)
    {
        echo"<p>No data found</p>";
    }
    else{
    ?> 
     <a class="btn btn-primary btn-lg ms-4 mt-4" href="supplierinfo.php">Go back</a>
          <div class="tablecontainer1">
          <div class="tablesection1">
    <table id="tableid" class="display">
        <thead>
        <tr>
            <td>Supplier ID</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Email</td>

    </tr>
        </thead>
        <tbody>
<?php
     for ($i=0; $i <$count ; $i++) 
     {
           $array=mysqli_fetch_array($query);
           
           $SuppID=$array['SupplierID'];
           $name=$array['SupplierName'];
           $phone=$array['Phone'];
           $email=$array['Email'];

           echo"<tr>";
           echo "<td>".$SuppID."</td>";
           echo "<td>".$name."</td>";
           echo "<td>".$phone."</td>";
           echo "<td>".$email."</td>";
          echo "</tr>";     
     }

?>


        </tbody>
    </table>
          </div>
          </div>
<?php
    }
    ?>
    </form>
</body>
</html>