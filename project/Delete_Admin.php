<?php
include "DB_CONNECTION.php";
$id=$_POST['id'];
$query="DELETE from admin where id=$id";
$result =mysqli_query($connection,$query);

if($result){
    header('location:show_all_Admin.php');
}

