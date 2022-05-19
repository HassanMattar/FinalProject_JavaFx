<?php
$connection=mysqli_connect(
    'localhost',
    'root',
    '',
    'project2');
if(!$connection){
    die('Error' .
        mysqli_connect_error());
}