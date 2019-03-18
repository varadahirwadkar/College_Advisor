<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();
 if(isset($_SESSION['login_user'])){

		header ("location:collegeAdmin/u.php.php");
  }?>
  <!DOCTYPE HTML>
<html>
<head>
		<title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="css/menu.css" type="text/css" media="all">
		       <style>

.login {
  margin: 20px auto;
  width: 300px;
  padding: 30px 25px;
  background: white;
  border: 1px solid #c4c4c4;
}

h1.login-title {
  margin: -28px -25px 25px;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  font-weight: 300;
  color: #ADADAD;
  text-align:center;
  background: #f7f7f7;
 
}

.login-input {
  width: 285px;
  height: 50px;
  margin-bottom: 25px;
  padding-left:10px;
  font-size: 15px;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
  }
.login-button {
  width: 100%;
  height: 50px;
  padding: 0;
  font-size: 20px;
  color: #fff;
  text-align: center;
  background: #f0776c;
  border: 0;
  border-radius: 5px;
  cursor: pointer; 
  outline:0;
}

.login-lost
{
  text-align:center;
  margin-bottom:0px;
}

.login-lost a
{
  color:#666;
  text-decoration:none;
  font-size:13px;
}
.logo{
	line-height: 5em;
}

</style>
<body >
	
		<div class="logo">
			<center><img src="images\ca.png" id="abc"></center>
		</div>
  <form class="login" action="" method="post">
    <h1 class="login-title">Simple Login</h1>
    <input type="text" class="login-input" name="username" placeholder="Email Adress" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" value="Lets Go" name="login" class="login-button">
  <p class="login-lost"><a href="">Forgot Password?</a></p>
  </form>
</body>
<?php
$link = mysqli_connect('localhost','root','','college'); 

global $link;
if(isset($_POST['login']))
{
$uname = $_POST["username"];
$upassword =$_POST["password"];

$res = mysqli_query($link,"select * from collegeadmin where email='$uname' and password='$upassword'");

if(mysqli_num_rows($res)>0)
{
	//echo "You are login Successfully ";
 $row = mysqli_fetch_assoc($res);
 $_SESSION['login_user'] = $uname;
 $_SESSION['login_id']=$row['college_id'];
 	 header("location:collegeAdmin/u.php?id=1"); 
}
else
{
echo '<script>alert("Invalid Login Details")</script>';
echo '<script>window.location="homePage.php"</script>';	
}
}
?>
</html>