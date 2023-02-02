<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

</head>
<body>
<div class="card text-center ">
  <div class="card-header fixed_container">
  <a class="btn btn-primary btn-lg" href="staff.php">Go Back</a>
  <a class="btn btn-secondary btn-lg" href="Staff_Search.php">Search >></a>
  </div>
</div>
  
    <?php

    $select="SELECT * FROM Staff ORDER BY StaffID DESC";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count<1)
    {
        echo"<p>No Data Found!</p>";
    }
    else{
         ?>   
            <div class="main card_container">
          <div class="staffdetail_container">
          <div class="card col-md-4 mb-4 mt-4 mx-auto" style="width: 35rem;">
          <div class="card-body">
                     
<?php
        for ($i=0; $i < $count; $i++) 
        { 
           $row=mysqli_fetch_array($query);
           $Staffid=$row['StaffID'];
             ?>
        <img src="<?php echo $row['Profile']?>" class="card-img-top" alt="...">
        <br></br>
      <h5 class="card-title"><span>Staff ID-</span><?php echo "<b>".$Staffid."</b>"?></h5>
      <h5 class="card-title"><span>Staff Name-</span><?php echo "<b>".$row['StaffName']."</b>"?></h5>
      <h5 class="card-title"><span>Gender-</span><?php echo "<b>".$row['Gender']."</b>"?></h5>
      <h5 class="card-title"><span>Phone-</span><?php echo "<b>".$row['Phone']."</b>"?></h5>
      <h5 class="card-title"><span>Email-</span><?php echo "<b>".$row['Email']."</b>"?></h5>
      <h5 class="card-title"><span>Address-</span><?php echo "<b>".$row['Address']."</b>"?></h5>
    <a class="btn btn-primary" href="Staff_Update.php?StaffID=<?php echo $Staffid?>"  >Edit</a>
    <a class="btn btn-danger" href="Staff_Delete.php?StaffID=<?php echo $Staffid?>" >Delete </a>
    
        <hr/>
    <?php
             }
            ?>  
          </div> 
     </div>
          </div>
    </div>
        
          <?php
    }
?>
</div>
<script src="main.js"></script>
</body>
</html>