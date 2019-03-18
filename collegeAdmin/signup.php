<html>
<style>
body{
background:lightblue;
}
.signuptbl{
	margin-top:1%;
}
input{
 border:1px solid black;
 border-radius:10px;
 height:30px;
}
.sgnlbl{
	padding:20px 20px 20px 20px;
}
.btn{
 padding-top:30px;
 margin-left:440px;
}
button{
 background:orange;
 border-radius:20px;
 height:40px;
 width:150px;
}

</style>

<body>
<div align="center">
 <h1 align="center"><font face="Comic Sans MS"color="#008000"size="10">C</font><font color="black">ollege </font><font face="Comic Sans MS"color="#008000"size="10">A</font><font color="black">dvsior.</font> </h1> 


<form action="" method="post" >
<table class="signuptbl">
<tr><th class="sgnlbl">College Code:</th><th class="sgnlbl"><input type="text"  name="collegeid" required pattern="^[0-9]{4}"></th></tr>
<tr><th class="sgnlbl">Contact:</th><th class="sgnlbl"><input type="tel" name="mob" required pattern="[0-9]{10}"></th></tr>
<tr><th class="sgnlbl">E-Mail:</th><th class="sgnlbl"><input type="email" name="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></th></tr>
<tr><th class="sgnlbl">Password:</th><th class="sgnlbl"><input type="password" name="password" required pattern="^(?=(.*\d){2})(?=.*[a-zA-Z])(?=.*[!@#$%])[0-9a-zA-Z!@#$%]{8,}"></th></tr>
<tr><th class="sgnlbl">Confirm Password:</th><th class="sgnlbl"><input type="password" name="password1" required pattern="^(?=(.*\d){2})(?=.*[a-zA-Z])(?=.*[!@#$%])[0-9a-zA-Z!@#$%]{8,}"></th></tr>

</table><br><br><br>
<button name="signup" type="submit">Submit</button>
</div>
</form>
</body>
<?php
   session_start();// Starting Session
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
$link = mysqli_connect('localhost','root','','college'); 


$collegeid=$_POST["collegeid"];
$email=$_POST["email"];
$mob=$_POST["mob"];
if($_POST["password"]==$_POST["password1"]){
$pass=$_POST["password"];
}
$sql = "INSERT INTO collegeadmin (college_id,email,mobile,password) VALUES ('$collegeid','$email','$mob','$pass')";
if(isset($_POST['signup'])){
if (mysqli_query($link, $sql)) {
	 echo '<script>alert("Successfully sign up")</script>';
echo '<script>window.location="../collegeLogin.php"</script>';

}else{
	echo '<script>alert("Failed to sign up")</script>';
echo '<script>window.location="../homePage.php"</script>';
}
}

mysqli_close($link);


?>
</html>


