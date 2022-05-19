<?php
include "DB_CONNECTION.php";
$id=$_POST['id'];
$query1="SELECT status FROM admin where id =$id";
$result1 =mysqli_query($connection,$query1);
$row=mysqli_fetch_assoc($result1);

if($row['status']&& $_COOKIE['id']!=$id){
    $query="UPDATE admin
SET status = 0
WHERE  id=$id";
$result =mysqli_query($connection,$query);
}else {
    $query="UPDATE admin
SET status = 1
WHERE  id=$id";
$result =mysqli_query($connection,$query);
}

if($result){
    header('location:show_all_Admin.php');
}