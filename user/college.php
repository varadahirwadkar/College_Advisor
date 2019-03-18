<?php
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } 
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="../css/college.css" type="text/css" media="all">
		<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">

<style>
label{
	 font-family: Arial, Helvetica Neue, sans-serif;
	font-size: 1.1em;
}
b{
	font-size: 1.2em;
}
</style>
		
    </head>
    
        <body>
			
     <h1 align="center"><font face="Comic Sans MS"color="#008000"size="10">C</font><font color="black">ollege </font><font face="Comic Sans MS"color="#008000"size="10">A</font><font color="black">dvsior.</font> </h1>
  	  <ul>
           <li><a href="u.php?id=1">Home</a></li>
		   <li><a href="u.php?id=2">Choose College</a></li>
           <li><a href="u.php?id=3">Feedback</a></li>
		    <li><a href="u.php?id=4">About</a></li>
		   <li><?php echo $_SESSION['login_user']; ?>
		   <ul><li><a href="u.php?id=5">Profile</a></li>
		   <li><a href="u.php?id=6">Signout</a></li>
</ul></li>
       </ul>

<div class="main">

	   <br>
	   
	   <br><br>
	   
	
	   
	    <?php
	  error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

  function runMyFunction($para) {

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
   $sql = "SELECT * FROM college_cutoff cut,college_info inf where cut.college_id='$para' and inf.coll_id='$para'";
   
if($result = mysqli_query($conn, $sql))
{
	
}
else{
	echo "fails";
}
	
		
		
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$result1 = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    $name=$row["college_name"];
	 $min= $row["min"];
$max= $row["max"];
$placement= $row["placement"];
$infra= $row["infra"];
$other= $row["other"];

$faculty= $row["faculty"];
 $img=$row["image_name"];
	 $fees=$row["fees"];
	$type=$row["type"];
	global $max,$min,$type,$fees;
    }
} else {
	
    echo "Sorry 0 Results";
}
echo "<label>";
echo '<div class="show2">';

echo'<table border="0" cellspacing="10" width="82%" cellpadding="10" align="center">
<tr>
<td colspan="3"><img src=../images/'.$img.' height="400" width="1000"></td>
</tr>
<tr>
<td colspan="3"><h3>'.$name.'</h3></td>
</tr>
<td><b>Cuttoff Marks 2017:
<tr align="center">
<td><b>Department</b></td>
<td><b>Minimum Marks</b></td>   
<td><b>Maximum Marks</b></td>  
</tr>';
               
  while($row1 = mysqli_fetch_assoc($result1)) {
     
echo'<tr align="center">
<td><b>'.$row1['department'].'</b></td>
<td>'.$row1['min'].'</td>   
<td>'.$row1['max'].'</td> ';
 
echo '</tr>';
}			echo '<tr>
<td colspan="3"><b>Type </b>:'.$type.'&nbsp
<b>Fees:Rs.</b>'.$fees.'</td>
</tr>
<tr>
<td colspan="3"><b>Pacement:</b><p align="justify"> '.$placement.'</p></td>
</tr>
<tr>
<td colspan="3"><b>Faculty :</b><p align="justify">'.$faculty.'</p></td>
</tr>
<tr>
<td colspan="3"><b>Infrasture :</b><p align="justify">'.$infra.'</p></td>
<tr>
<td colspan="3"><b>Other :</b><p align="justify">'.$other.'</p></td>
</tr>
</tr>

    



</table>';

echo "</div>";
echo "</label>";

  }
 
   if (isset($_GET['submit'])) {
	  $para=$_GET['id'];
    runMyFunction($para);
  }
  
   if (isset($_GET['id'])) {
	  $para=$_GET['id'];
	
    runMyFunction($para);
  }  
 else{
	 echo "not doje";
 }

?>

	   </div>
	   
	   <div class="left">
<!--
<font color="#408000" size="3" align="center"><b>News</font>
 <font color="black" size="3">And Announcements</font>
</b></center>
</p>
<marquee bgcolor=" white" onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="2" direction="up" loop="infinite"  overflow="hidden" position="relative"  >
<center>
<font color="#408000" size="+1">Admission Dates</font><br> 
<font color="#66cc00" size="+1">________________</font><br>
<font color="#408000" size="+1">College Information</font><br>
<font color="#66cc00" size="+1">________________</font><br>
<font color="#408000" size="+1">College Rankings</font><br>
<font color="#66cc00" size="+1">________________</font>
</center>
</marquee>
-->
          </div>
		
</div>
<?php include('footer.html');
?>
    </body>
</html>
