<?php  
function AddProduct($MenuID,$BuyQuantity)
{
	include('connect.php');

	$select="SELECT * FROM Menu WHERE MenuID='$MenuID' ";
	$query=mysqli_query($connect,$select);
	$count=mysqli_num_rows($query);
	$array=mysqli_fetch_array($query);

	if ($count < 1) 
	{
		echo "<script>window.alert('No Product Found.')</script>";
		exit();
	}

	if ($BuyQuantity < 1) 
	{
		echo "<script>window.alert('Please Enter Correct Quantity')</script>";
		exit();
	}

	if(isset($_SESSION['Shopping_Cart'])) 
	{
		$Index=IndexOf($MenuID);

		if($Index == -1) 
		{
			$size=count($_SESSION['Shopping_Cart']);

			$_SESSION['Shopping_Cart'][$size]['MenuID']=$MenuID;
			$_SESSION['Shopping_Cart'][$size]['Quantity']=$BuyQuantity;

			$_SESSION['Shopping_Cart'][$size]['MenuName']=$array['MenuName'];
			$_SESSION['Shopping_Cart'][$size]['Price']=$array['Price'];
			$_SESSION['Shopping_Cart'][$size]['MenuImage1']=$array['MenuImage1'];
		}
		else
		{
			$_SESSION['Shopping_Cart'][$Index]['Quantity']+=$BuyQuantity;
		}
	}
	else
	{
		$_SESSION['Shopping_Cart']=array();

		$_SESSION['Shopping_Cart'][0]['MenuID']=$MenuID;
		$_SESSION['Shopping_Cart'][0]['Quantity']=$BuyQuantity;

		$_SESSION['Shopping_Cart'][0]['MenuName']=$array['MenuName'];
		$_SESSION['Shopping_Cart'][0]['Price']=$array['Price'];
		$_SESSION['Shopping_Cart'][0]['MenuImage1']=$array['MenuImage1'];
	}

	echo "<script>window.location='Shopping_Cart.php'</script>";
}

function IndexOf($MenuID)
{
	if(!isset($_SESSION['Shopping_Cart'])) 
	{
		return -1;
	}

	$size=count($_SESSION['Shopping_Cart']);

	if($size < 1) 
	{
		return -1;
	}
	else
	{
		for($i=0;$i<$size;$i++) 
		{ 
			if($MenuID == $_SESSION['Shopping_Cart'][$i]['MenuID']) 
			{
				return $i;
			}	
		}
		return -1;
	}
}

function RemoveProduct($MenuID)
{
	$Index=IndexOf($MenuID);

	unset($_SESSION['Shopping_Cart'][$Index]);

	$_SESSION['Shopping_Cart']=array_values($_SESSION['Shopping_Cart']);

	echo "<script>window.location='Shopping_Cart.php'</script>";
}

function ClearAll()
{
	unset($_SESSION['Shopping_Cart']);
	echo"<script>window.alert('Thank you for visiting us!')</script>";
	echo "<script>window.location='Menu.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	$size=count($_SESSION['Shopping_Cart']);

	for ($i=0; $i < $size; $i++) 
	{ 
		$BuyQuantity=$_SESSION['Shopping_Cart'][$i]['Quantity'];
		$Price=$_SESSION['Shopping_Cart'][$i]['Price'];	
		$TotalAmount=$TotalAmount + ($BuyQuantity * $Price);
	}
	return $TotalAmount;
}

function CalculateTotalQuantity()
{
	$TotalQuantity=0;

	$size=count($_SESSION['Shopping_Cart']);

	for ($i=0; $i < $size; $i++) 
	{ 
		$BuyQuantity=$_SESSION['Shopping_Cart'][$i]['Quantity'];
		$TotalQuantity=$TotalQuantity + $BuyQuantity;
	}
	return $TotalQuantity;
}
?>