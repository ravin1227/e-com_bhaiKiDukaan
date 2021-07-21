<?php 
require ('connection.inc.php');
$email = $password =$pwd ='';

$email =$_POST['loginemail'];
// $pwd =$_POST['loginpassword'];
// $password = md5($pwd);


$password =$_POST['loginpassword'];



$sql ="SELECT * FROM users  WHERE email='$email' And password ='$password'";
$result =mysqli_query($con,$sql) or die("Query Failed : Login Query");


if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
		$_SESSION['USER_LOGIN']='yes';
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		  header("Location: {$hostname}/");
}else{
	echo "Please enter correct details";
}

?>