<?php
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } elseif($_SESSION['login_user']!=="varadq"){
		echo '<script>alert("Sign in as Admin")</script>';
  }
 
 include('menu.php');
   $link = mysqli_connect('localhost','root','','college'); 
   
$name=$_POST["name"];
$coll_id=$_POST["coll_id"];
$min1=$_POST["min1"];
$max1=$_POST["max1"];

$min2=$_POST["min2"];
$max2=$_POST["max2"];

$min3=$_POST["min3"];
$max3=$_POST["max3"];

$min4=$_POST["min4"];
$max4=$_POST["max4"];

$min5=$_POST["min5"];
$max5=$_POST["max5"];

$min6=$_POST["min6"];
$max6=$_POST["max6"];
$sql1 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'civil', '$min1', '$max1')";
$sql2 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'mech', '$min2', '$max2')";
$sql3 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'ee', '$min3', '$max3')";
$sql4 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'it', '$min4', '$max4')";
$sql5 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'comp', '$min5', '$max5')";
$sql6 = "INSERT INTO `college_cutoff1` ( `college_id`, `college_name`, `department`, `min`, `max`) VALUES ('$coll_id', '$name', 'entc', '$min6', '$max6')";



echo $coll_id;


if (isset($_POST['submit'])) {
		if(!empty($min1) && !empty($max1)){
                if (mysqli_query($link, $sql1)) {
                   echo "Sucess1!";
		}}

		if(!empty($min2) && !empty($max2)){		
			if (mysqli_query($link, $sql2)) {
		echo "Sucess2!";
		}}

		if(!empty($min3) && !empty($max3)){
			if (mysqli_query($link, $sql3)) {
			echo "Sucess3!";
		}}
		
		if(!empty($min4) && !empty($max4)){
			if (mysqli_query($link, $sql4)) {
			echo "Sucess4!";
		}}
		if(!empty($min5) && !empty($max5)){
			if (mysqli_query($link, $sql5)) {
			echo "Sucess5!";
		}}
		if(!empty($min6) && !empty($max6)){
			if (mysqli_query($link, $sql6)) {
			echo "Sucess6!";
		}}
}

mysqli_close($link);

 
	
?>
<html>
<head>
<body>
    
     <form action="" method="post">

ENter name:<input type="text" name="name" /><br>
ENter college ID:<input type="number" name="coll_id" /><br>
Department:CIVIL<br>
min:<input type="float" name="min1"/>max:<input type="float" name="max1" /><br>

Department:MECH<br>
min:<input type="float" name="min2"/>max:<input type="float" name="max2" /><br>

Department:EE<br>
min:<input type="float" name="min3"/>max:<input type="float" name="max3" /><br>

Department:IT<br>
min:<input type="float" name="min4"/>max:<input type="float" name="max4" /><br>

Department:COMP<br>
min:<input type="float" name="min5"/>max:<input type="float" name="max5" /><br>

Department:ENTC<br>
min:<input type="float" name="min6"/>max:<input type="float" name="max6" /><br>

<input type="submit" name="submit" value="Submit" >
		
	 </form>

   </body>

</head>
</html>
