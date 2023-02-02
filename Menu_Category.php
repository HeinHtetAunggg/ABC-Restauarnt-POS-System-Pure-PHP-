<?php
include('connect.php');

if(isset($_POST['btnsubmit']))
{
    $CatName=$_POST['txtcatname'];

    $select="SELECT * FROM MenuCategory WHERE CategoryName='$CatName'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count>0)
    {
        echo "<script>window.alert('CategoryName Already Registered')</script>";
    }
    else{
        $insert="INSERT INTO MenuCategory(CategoryName)
                 VALUES('$CatName')";
       $query=mysqli_query($connect,$insert);        
   
    if($query)
    {
        echo "<script>window.alert('Successfully Registered')</script>";
        echo "<script>window.location='Menu_Category.php'</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Category Registration</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-primary">ABC Restauarnt</a>
  </div>
</nav>
<div class="container mt-4 p-4 border border-secondary rounded" style="width:40%">
        <div class="row">
        <div class="col-md-7 mx-auto">
        <h3 class="text-primary text-center my-2">Category Register Form</h3>
            <form action="Menu_Category.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" class="form-control" name="txtcatname">
  </div>
  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
  </form>
        </div>
</div>

    
</body>
</html>