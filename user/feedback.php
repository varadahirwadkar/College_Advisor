

<?php

 if(!isset($_SESSION['login_user'])){

		header ("location:../homePage.php");
		exit();
  }

error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();
$id = $_SESSION['login_id'];



 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
global $conn;
 $sql = "SELECT * FROM student where id='$id'";


$result = mysqli_query($conn, $sql);

	
if (mysqli_num_rows($result) > 0) {
  

   $row = mysqli_fetch_assoc($result);
	$name=$row['name'];
	$email=$row['email'];
	$email1=$_POST['email1'];
	$name1=$_POST['name1'];
	$feed=$_POST['feedback'];
	global $name;
	global $email;
}
$sql1 = "insert into feedback (name,email,feed) values('$name1','$email1','$feed')";

if(isset($_POST['submit']))
{
	$res=mysqli_query($conn,$sql1);
	if($res)
	{
		echo '<script>alert("Thank You for feedback")</script>';
	}
}

?>

<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

html{
  background:#74777c;
}

#feedback-page{
	text-align:center;
}

#text-feedback{
	width: 80%;
	padding-left: 10%;
	padding-right: 10%;
	background-color:white;
	text-align:center;
}

#form-main{
	width:100%;
	float:left;
	padding-top:30px;
}

#form-div {
	background-color:#3c3c3c;
	padding-left:35px;
	padding-right:35px;
	padding-top:20px;
	padding-bottom:50px;
	width: 450px;
	float: left;
	left: 50%;
	position: absolute;
	margin-left: -260px;
}

.feedback-input {
	opacity:0.9;
	color:#0493bd;
	font-family: 'Montserrat', Helvetica, Arial, sans-serif;
  font-weight:400;
	font-size: 18px;
	border-radius: 0;
	line-height: 22px;
	background-color: #fbfbfb;
  border: 3px solid #fbfbfb;
	padding: 13px 13px 13px 54px;
	margin-bottom: 10px;
	width:80%;
	
}

.feedback-input:focus{
	background: #fff;
	box-shadow: 0;
	border: 3px solid #3498db;
	color: #3498db;
	outline: none;
  padding: 13px 13px 13px 54px;
}

.focused{
	color:#30aed6;
	border:#30aed6 solid 3px;
}

/* Icons ---------------------------------- */

textarea {
	width: 100%;
	height: 150px;
	line-height: 150%;
}

input:hover, textarea:hover,
input:focus, textarea:focus {
	background-color:white;
}

#button-blue{
	font-family: 'Montserrat', Helvetica, Arial,  sans-serif;
	float:left;
	width: 100%;
	border: #fbfbfb solid 4px;
	background-color: #3498db;
	color:white;
	font-size:24px;
	padding-top:22px;
	padding-bottom:22px;
	
}

.cont{
 margin-left:32%;
 font-size:28px;
 color:yellow;

}
</style>
			<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all" />

<body>


<div id="form-main">
  <div id="form-div">
    <form class="form"  method="post" action=""id="form1">
      
      <p class="cont">
        Contact Us.
      </p>
      
      
      <p class="name">
        <input name="name1" type="text" class="feedback-input" value="<?php echo $name; ?>" id="name" />
      </p>
      
      <p class="email">
        <input name="email1" type="text" class="feedback-input" id="email" value="<?php echo $email; ?>" />
      </p>
      
      <p class="text">
        <textarea type="text"name="feedback" class="feedback-input" id="comment" placeholder="Comment"></textarea>
      </p>
      

        
      <div class="submit">
        <input type="submit" name="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
  
  </body>
  </html>
