<?php 

include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

</head>
<body>
    <?php
      $select="SELECT * FROM Supplier ORDER BY SupplierID DESC";
      $query=mysqli_query($connect,$select);
      $count=mysqli_num_rows($query);

      if($count<1)
      {
        echo"<p>No Data Found</p>";
      }
      else
      {
      ?>
        <div class="card text-center">
      
  <div class="card-header">
  <a class="btn btn-primary btn-lg" href="supplier.php">Go Back</a>
  <a class="btn btn-secondary btn-lg" href="Supplier_Search.php">Search >></a>
  </div>
  <div class="card-body">
    <?php
    for ($i=0; $i < $count; $i++) { 
        $array=mysqli_fetch_array($query);
        $SupplierID=$array['SupplierID'];
        $SupplierName=$array['SupplierName'];
        $SuppEmail=$array['Email'];
        $SuppPhone=$array['Phone'];
      ?>
    
           <h5 class="card-title"><?php echo "<b>". $SupplierName."</b>"?></h5>
    <p class="card-text">ID -<?php echo "<b>". $SupplierID."</b>"?></p>
    <p class="card-text">Email -<?php echo "<b>". $SuppEmail."</b>"?></p>
    <p class="card-text">Phone -<?php echo "<b>". $SuppPhone."</b>"?></p>
    <a  class="btn btn-primary" href="Supplier_Update.php?SupplierID=<?php echo $SupplierID?>">Edit</a>
    <a class="btn btn-danger" href="Supplier_Delete.php?SupplierID=<?php echo $SupplierID?>">Delete</a>
    <hr/>
         
<?php
         }
?>
     </div>
     </div>
<?php
    }
    ?>
    
</body>
</html>