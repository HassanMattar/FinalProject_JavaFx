
<?php
include_once 'DB_CONNECTION.php';

$errors=[];
$success=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
}
if(empty($email)){
    $errors['email_error']="email is Required please fill it";
}if(empty($password)){
    $errors['password_error']="password is Required please fill it";
}
if(count($errors)>0){
    $errors['general_errors']='please fill all errors';

}else{


$query="SELECT * FROM admin where password='$password' and email='$email' and status=1";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
echo $row;
if($row){
$errors=[];
    $success=true;
  header('Location:index.php');

}else{  
$querys="SELECT * FROM admin where password='$password' and email='$email'and status=0";
$results=mysqli_query($connection,$querys);
$rows=mysqli_fetch_assoc($results);
 if($rows){
		echo "  <form class='c_form' action='login/index.php' >
        <h1 Style='color:red'>your not Ativity </h1>
        <button type='submit' Style='color:green'>
        Try Again
    </button>";
	}else{
        echo "  <form class='c_form' action='login/index.php' >
        <h1 Style='color:red'> there error In Password or Email</h1>
        <button type='submit' Style='color:green'>
                Try Again
            </button>";
    }  	
}
}

?>
