<?php
include('connect.php');

if(isset($_POST['btnUpdate']))
{
    $Menuid=$_POST['txtMenuID'];
    $UpdateName=$_POST['txtname'];
    $UpdatePrice=$_POST['txtprice'];
    $UpdateQuan=$_POST['txtquan'];
    $UpdateDes=$_POST['txtdes'];

    $Update="UPDATE Menu
            SET MenuName='$UpdateName',Price='$UpdatePrice',Quantity='$UpdateQuan',Description='$UpdateDes'
            WHERE MenuID='$Menuid'";
    $query=mysqli_query($connect,$Update);
    if($query)
    {
        echo"<script>alert('Successfully Updated')</script>";
        echo"<script>window.location='Menuinfo.php'</script>";
    }
    else
    {
        echo"<p> Something went wrong".mysqli_error($connect)."</p>";
    }
}

$MenuID=$_GET['MenuID'];
$select="SELECT * FROM Menu WHERE MenuID='$MenuID'";
$query=mysqli_query($connect,$select);
$array=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Menu</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <form action="Menu_Update.php" method="POST"  enctype="multipart/form-data">
    <section class="vh-100" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-white mb-4">Updating Menu</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
          <a class="btn btn-warning " href="Menuinfo.php" type="button">Go Back</a>
            <div class="row align-items-center pt-4 pb-3">
           
             <hr/>
              <div class="col-md-3 ps-5">

              

                <h6 class="mb-0">Menu Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name='txtname' class="form-control form-control-lg" value="<?php echo $array['MenuName']?>" required/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
             
                <h6 class="mb-0"> Price</h6>

              </div>
              <div class="col-md-9 pe-5">
             
                <input type="number" name='txtprice' class="form-control form-control-lg" value="<?php echo $array['Price']?>" requried/>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Quantity</h6>

              </div>
              <div class="col-md-9 pe-5">
              <input type="number" name='txtquan' class="form-control form-control-lg" value="<?php echo $array['Quantity']?>" required/>
                

              </div>
            </div>

            <hr class="mx-n3">

        

            <div class="row align-items-center py-3">
            <div class="col-md-3 ps-5">
 
                 <h6 class="mb-0"> Description</h6>

            </div>
             <div class="col-md-9 pe-5">
 
             <textarea class="form-control" name='txtdes' rows="3"  ><?php echo $array['Description']?></textarea>
                     </div>
            </div>

            <div class="px-5 py-4 ">
            <input type="hidden" name="txtMenuID" value="<?php echo $MenuID ?>">
              <button type="submit" name='btnUpdate' class="btn btn-primary btn-lg">Update</button>
              <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
               
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>


    </form>
</body>
</html>