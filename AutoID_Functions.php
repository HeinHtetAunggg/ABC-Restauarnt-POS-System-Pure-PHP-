<?php 
   
function AutoID($tableName,$fieldName,$prefix,$noOfLeadingZeros)

{
    include('connect.php');

    $newID="";
    $sql="";
    $value=1;

    $sql="SELECT " . $fieldName . " FROM " . $tableName . " ORDER BY ". $fieldName . " DESC";

    $query=mysqli_query($connect,$sql);
    $count=mysqli_num_rows($query);
    $array=mysqli_fetch_array($query);

    if($count <1)
    {
         return $prefix . "000001";
    }
    else{
        $oldID=$array[$fieldName];
        $oldID=str_replace($prefix,"",$oldID);
        $value=(int)$oldID;
        $value++;
        $newID=$prefix . NumberFormatter($value,$noOfLeadingZeros);
        return $newID;
    }
}

    function NumberFormatter($number,$n)
    {

        return str_pad((int) $number,$n,"0",STR_PAD_LEFT);

    }

?>