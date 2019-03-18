<?php
   session_start();// Starting Session
 include("config.php");
$error=''; // Variable To Store Error Message
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

if(isset($_SESSION['login_user'])){
		header ("location:user/home.php");
		exit();
}elseif (isset($_POST['login'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
  }
 
$name=$_POST["name"];
$email=$_POST["email"];
$mob=$_POST["mobile"];
if($_POST["password"]==$_POST["confirmpass"]){
$pass=$_POST["password"];

}
$link = mysqli_connect('localhost','root','','college'); 

global $link;


	
$sqll = "INSERT INTO student (name,email,mobile,password) VALUES ('$name','$email','$mob','$pass')";
 
  
if(isset($_POST['login']))
{
$uname = $_POST["username"];
$upassword =$_POST["password"];

$res = mysqli_query($link,"select * from student where name='$uname'and password='$upassword'");

if(mysqli_num_rows($res)>0)
{
	//echo "You are login Successfully ";
 $row = mysqli_fetch_assoc($res);
 $_SESSION['login_user'] = $uname;
 $_SESSION['login_id']=$row['id'];
 if($_SESSION['login_user']=="varadq")
 {
	 header("location:admin/u.php?id=1"); 
 }
 else{
	header("location:user/u.php?id=1");   // create my-account.php page for redirection 
 }
}
else
{
echo '<script>alert("Invalid Login Details")</script>';
echo '<script>window.location="homePage.php"</script>';	
}
}
if(isset($_POST['signup'])){
if (mysqli_query($link, $sqll)) {
	 echo '<script>alert("Successfully sign up")</script>';
echo '<script>window.location="homePage.php"</script>';

}else{
	echo '<script>alert("Failed to sign up")</script>';
echo '<script>window.location="homePage.php"</script>';
}
}


mysqli_close($link);


?>