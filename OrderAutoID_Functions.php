<?php
function OrderAutoID($tableName,$fieldName,$prefix,$noOfLeadingZeros)
{
    include('connect.php');
    $newID="";
    $select="";
    $value=1;
$select="SELECT " . $fieldName . " FROM " . $tableName . " ORDER BY " . $fieldName . " DESC ";
$query=mysqli_query($connect,$select);
$count=mysqli_num_rows($query);
$array=mysqli_fetch_array($query);

if($count <1)
{
    return $prefix . "001";
}
else
{
   $oldID=$array[$fieldName];
   $oldID=str_replace($prefix,"",$oldID);
   $value=(int)$oldID;
   $value++;
   $newID=$prefix.NumberFormatter($value,$noOfLeadingZeros);
   return $newID;
}

}
function NumberFormatter($number,$n)
{
    return str_pad((int)$number,$n,"0",STR_PAD_LEFT);
}
?>