<?php

include_once "DB_CONNECTION.php";
$id=$_POST['id'];
$query="DELETE from categories where id = $id";
$result=mysqli_query($connection,$query);
if ($result){
    header('location:show_all_category.php');
}