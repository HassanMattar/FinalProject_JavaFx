<?php
include_once "DB_CONNECTION.php";
$id=$_POST['id'];
$query="SELECT * from product_file where product_id = $id";
$result=mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result)){
    unlink('uploads/images/'.$row['image']);
}
$query1 = "DELETE from product_file where product_id = $id";
$result1 = mysqli_query($connection,$query1);
if($result1){
    $query2 = "DELETE from product where id = $id";
    $result2 = mysqli_query($connection,$query2);
    if($result1)
    header("location:show_product.php");
}