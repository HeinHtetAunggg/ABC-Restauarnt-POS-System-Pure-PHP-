<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<?php 
function AddProduct($FoodProductID,$PurchaseQuantity,$PurchasePrice)
{
    include('connect.php');
    $select="SELECT * FROM FoodProduct WHERE FoodProductID='$FoodProductID'";
    $query=mysqli_query($connect,$select);
    $count=mysqli_num_rows($query);
    $array=mysqli_fetch_array($query);

    if($count<1)
    {
        echo"<b>No Product Found</b>";
        exit();           

    }

    if($PurchaseQuantity <1)
    {
        echo "<b>Please Enter Quantity</b>";
        exit();  
       
    }   
    if(isset($_SESSION['Purchase_Functions']))
    {
       $Index=IndexOf($FoodProductID);
       if($Index ==-1)
       {
           $count=count($_SESSION['Purchase_Functions']);

           $_SESSION['Purchase_Functions'][$count]['FoodProductID']=$FoodProductID;
           $_SESSION['Purchase_Functions'][$count]['Quantity']=$PurchaseQuantity;
           $_SESSION['Purchase_Functions'][$count]['Price']=$PurchasePrice;

           $_SESSION['Purchase_Functions'][$count]['ProductName']=$array['ProductName'];
           $_SESSION['Purchase_Functions'][$count]['Image']=$array['Image'];
       } 
       else
       {
           $_SESSION['Purchase_Functions'][$Index]['Quantity'] +=$PurchaseQuantity;
       }
    }
    else
    {
       $_SESSION['Purchase_Functions']=array();

       $_SESSION['Purchase_Functions'][0]['FoodProductID']=$FoodProductID;
       $_SESSION['Purchase_Functions'][0]['Quantity']=$PurchaseQuantity;
       $_SESSION['Purchase_Functions'][0]['Price']=$PurchasePrice;

       $_SESSION['Purchase_Functions'][0]['ProductName']=$array['ProductName'];
       $_SESSION['Purchase_Functions'][0]['Image']=$array['Image'];
    }
    echo "<script>window.location='Purchase.php'</script>";
}

function CalculateTotalAmount()
{
    $TotalAmount=0;
        $size=count($_SESSION['Purchase_Functions']);
    for ($i=0; $i < $size ; $i++)
     { 
        $PurchaseQuantity=$_SESSION['Purchase_Functions'][$i]['Quantity'];
        $PurchasePrice=$_SESSION['Purchase_Functions'][$i]['Price'];
        $TotalAmount += ($PurchaseQuantity * $PurchasePrice);
      
    }
    return $TotalAmount;
}

  

function VAT()
{
    $VAT=0;
    $VAT=CalculateTotalAmount() *0.05;

    return $VAT;
}




function CalculateTotalQuantity()
{
   
    $TotalQuan=0;
    $size=count($_SESSION['Purchase_Functions']);
    
    for ($i=0; $i <$size ; $i++) { 
        $PurchaseQuantity=$_SESSION['Purchase_Functions'][$i]['Quantity'];
        $TotalQuan += $PurchaseQuantity;
    }
    return $TotalQuan;

}


function GrandTotal()
{
    $GrandTotal=0;
    $GrandTotal=CalculateTotalAmount() + VAT();
    
    return $GrandTotal;
}


function Remove($FoodProductID)
{
    $Index=IndexOf($FoodProductID);
    unset($_SESSION['Purchase_Functions'][$Index]);

    $_SESSION['Purchase_Functions']=array_values($_SESSION['Purchase_Functions']);
    echo"<script> window.location='Purchase.php'</script>";
}

function ClearAll()
{
    unset($_SESSION['Purchase_Functions']);
    "<script>window.location='Purchase.php'</script>";
}

function IndexOf($FoodProductID)
{
    if(!isset($_SESSION['Purchase_Functions']))
    {
       return -1;
    }
    $count=count($_SESSION['Purchase_Functions']);
    if($count < 1)
    {
        return -1;
    }
    else{
        for ($i=0; $i <$count ; $i++) { 
            if($FoodProductID==$_SESSION['Purchase_Functions'][$i]['FoodProductID'])
            {
                return $i;
            }
        }
        return -1;
    }

}

?>