<?php
include "DB_CONNECTION.php";
$id=$_POST['id'];
$query="DELETE from category where id=$id";
$result =mysqli_query($connection,$query);

if($result){
    header('location:show_all_category.php');
}