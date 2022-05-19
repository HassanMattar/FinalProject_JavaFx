<?php
include "DB_CONNECTION.php";
print_r($_POST);            
$id=$_POST['id'];
$querys="SELECT * FROM stores WHERE id=$id";
$results =mysqli_query($connection,$querys);
while($row=mysqli_fetch_assoc($results)){
    echo $row['Image'];     
    $e =$row['Image'];
}


$query="DELETE from stores where id=$id";
$result =mysqli_query($connection,$query);

if($result){
    header('location:Show_All_Stor.php');
}