<?php
session_start();
include ('connect.php');

if(isset($_POST['btnsave']))
{
    $MenuName=$_POST['txtname'];
    $Staff=$_SESSION['StaffID'];
    $Cat=$_POST['cboCategory'];
    $Price=$_POST['txtprice'];
    $Quantity=$_POST['txtquan'];
    $Des=$_POST['txtdes'];

    $image1=$_FILES['image1']['name'];
    $folder='images/';

    $filename=$folder.'_'.$image1;
    $image1=copy($_FILES['image1']['tmp_name'],$filename);

    if(!$image1)
    {
        echo"<script>window.alert('Cannot Upload Image 1)</script>";
    }

    $image2=$_FILES['image2']['name'];
    $folder='images/';

    $filename2=$folder.'_'.$image2;
    $image2=copy($_FILES['image2']['tmp_name'],$filename2);

    if(!$image2)
    {
        echo"<script>window.alert('Cannot Upload Image 2')</script>";
        exit();
    }

    $select="SELECT * FROM Menu WHERE MenuName='$MenuName'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count >0)
    {
        echo"<script>window.alert('Cannot Register Same Menu Twice')</script>";
    }
    else{
        $insert="INSERT INTO Menu(MenuName,StaffID,CategoryID,Price,Quantity,Description,MenuImage1,MenuImage2)
                VALUES('$MenuName','$Staff','$Cat','$Price','$Quantity','$Des','$filename','$filename2')";
        $query=mysqli_query($connect,$insert);
    }
    if($query)
    {
        echo"<script>window.alert('Successfully Registered')</script>";
        echo"<script>window.location='Menu_Register.php'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Menu</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <form action="Menu_Register.php" method="POST"  enctype="multipart/form-data">
    <section class="100%" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-white mb-4">Menu Registration</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
                <div class="d-flex justify-content-between">
            <h4 class='text-primary'>Registered By - <span><?php echo $_SESSION['StaffName']?></span></h4>
            <a href="Staff_Logout.php"  class="btn btn-danger mb-2  ">Log Out</a>
                </div>
             <hr/>
              <div class="col-md-3 ps-5">

              

                <h6 class="mb-0">Menu Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name='txtname' class="form-control form-control-lg" required/>

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
             
                <h6 class="mb-0"> Choose Category</h6>

              </div>
              <div class="col-md-9 pe-5">
             
              <select class="form-select" id="inputGroupSelect01" name="cboCategory">
           <option selected >Choose...</option>
           <?php
           $select="SELECT * FROM MenuCategory";
           $query1=mysqli_query($connect,$select);
           $count1=mysqli_num_rows($query1);
           for ($i=0; $i < $count1; $i++)
            { 
            $array=mysqli_fetch_array($query1);
            $CategoryID=$array['CategoryID'];
            $CategoryName=$array['CategoryName'];
            echo"<option value='$CategoryID'>$CategoryID - $CategoryName</option>";
           }
           
          ?>
          </select>
              </div>
            </div>
             
          <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
             
                <h6 class="mb-0"> Price</h6>

              </div>
              <div class="col-md-9 pe-5">
             
                <input type="number" name='txtprice' class="form-control form-control-lg" requried/>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Quantity</h6>

              </div>
              <div class="col-md-9 pe-5">
              <input type="number" name='txtquan' class="form-control form-control-lg" required/>
                

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Menu Image1</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" id="formFileLg" name='image1' type="file" required />
                <div class="small text-muted mt-2">Upload Menu  Image</div>

              </div>
            </div>

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Menu Image2</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" id="formFileLg" name='image2' type="file" required />
                <div class="small text-muted mt-2">Upload Menu  Image</div>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
            <div class="col-md-3 ps-5">
 
                 <h6 class="mb-0"> Description</h6>

            </div>
             <div class="col-md-9 pe-5">
 
             <textarea class="form-control" name='txtdes' rows="3" placeholder="Additional message for the menu"></textarea>
                     </div>
            </div>

            <div class="px-5 py-4">
              <button type="submit" name='btnsave' class="btn btn-primary btn-lg">Save</button>
              <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
              <a href="Menuinfo.php" class="ml-2 text-danger"> Menu Details>>>>></a>
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