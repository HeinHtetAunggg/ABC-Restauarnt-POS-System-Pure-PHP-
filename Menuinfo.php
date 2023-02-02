<?php 
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Info</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand bg-primary" href="#">
      <img src="images/logo.jpg" alt="Logo" width="200" height="140" class="d-inline-block align-text-center">
    </a>
  </div>
</nav>
<br>
<?php
$select="SELECT * FROM Menu ORDER BY MenuID ASC";
$query=mysqli_query($connect,$select);
$count=mysqli_num_rows($query);

if($count <1){
    echo"<p>No record Found !</p>";
}
else{
for ($i=0; $i<$count ; $i++) { 
  
$array=mysqli_fetch_array($query);
$Menuid=$array['MenuID'];
?>
<div class="row">
    <div class="card">
    
        <div class="d-flex justify-content-between">
         <img src="<?php echo $array['MenuImage1']?>" class="card-img rounded-4 mt-4" alt="..." style="width: 540px; height:300px;">
         <div class="card-body">
    <h5 class="card-title fs-2 text-primary d-flex justify-content-center" ><?php echo $array['MenuName'] ?></h5>
    <hr class='text-primary'/> 
    <div class="d-flex m-3 justify-content-around">
          <h6 class="fs-5 badge bg-primary text-wrap">Price <span class="text-white">$<?php echo $array['Price']?></span></h6>       
           <h6 class="fs-5 badge bg-primary text-wrap"> <span class="text-white"><?php echo $array['Quantity']?> Left For Today</span></h6>
        </div>
       
        <p class="card-text d-flex justify-content-center fs-3 text-danger">Description</p>
    <p class="card-text d-flex justify-content-center fs-4 fst-italic"><?php echo $array['Description']?></p>
    <div class="d-grid gap-2 col-4 mx-auto">
    <a href="Menu_Update.php?MenuID=<?php echo $Menuid ?>" class="btn btn-primary ">Edit</a>
    <a href="Menu_Delete.php?MenuID=<?php echo $Menuid ?>" class="btn btn-danger ">Delete</a>
</div>
  </div>
        
         <img src="<?php echo $array['MenuImage2']?>" class="card-img-top rounded-4 mt-4" alt="..." style="width: 540px; height:300px;">
        </div>
        
      </div>
    </div>
    <br/>
<?php
}
}

?>
</body>
</html>