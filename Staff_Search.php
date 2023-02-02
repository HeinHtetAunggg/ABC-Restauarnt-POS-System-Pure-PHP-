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
    <link href="style.css" rel="stylesheet"> 
    <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
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
<form action="Staff_Search.php" method="POST">
    <?php

    $select="SELECT * FROM Staff";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);

    if($count<1)
    {
        echo"<p>No Data Found!</p>";
    }
    else{
         ?>   
        <a class="btn btn-primary btn-lg ms-4 mt-4" href="staffinfo.php">Go back</a>
          <div class="tablecontainer">
          <div class="tablesection">
         <table class="display" id="tableid">
	<thead>
	<tr>
        <th>Image</th>
		<th>Staff ID</th>
		<th>Staff Name</th>
		<th>Gender</th>
		<th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
	</tr>
	</thead>

	<tbody>                 
<?php
        for ($i=0; $i < $count; $i++) 
        { 
            $array=mysqli_fetch_array($query);

            $StaffID=$array['StaffID'];
            $StaffImage=$array['Profile'];
    
    
            echo "<tr>";
                echo "<td> 
                      <img src= '$StaffImage' width='100px' height='100px'/>      
                      </td>";
                echo "<td>" . $StaffID . "</td>";
                echo "<td>" . $array['StaffName'] . "</td>";
                echo "<td>" . $array['Gender'] . "</td>";
                echo "<td>" . $array['Phone'] . "</td>";
                echo "<td>" . $array['Email'] . "</td>";
                echo "<td>" . $array['Address'] . "</td>"; 
                echo "<td>
					<a href='Staff_Update.php?StaffID=$StaffID'>Edit</a>
					|
					<a href='Staff_Delete.php?StaffID=$StaffID'>Delete</a>
				  </td>";
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