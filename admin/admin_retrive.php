
<?php 
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } elseif($_SESSION['login_user']!=="varadq"){
		echo '<script>alert("Sign in as Admin")</script>';
  }
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head><style>
td{
	text-align: center;
}
</style>

</head>
<body>
		<form   action="admin_retrive.php" method="post" id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="search" value="Search"> 
	    </form> 
		<br>
<?php

error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
        
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
  
   if(!isset($_POST["search"]))
{
   $sql =  "SELECT DISTINCT college_cutoff1.college_id,college_cutoff1.college_name, college_info1.coll_id,college_info1.image_name,college_info1.type\n"
    . "FROM college_cutoff1\n"
    . "LEFT JOIN college_info1 ON college_cutoff1.college_id = college_info1.coll_id";
   
if($result = mysqli_query($conn, $sql))
{
	
}
else{
	echo "fails";
}
	
		
		
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo '<table>
        <thead>
            <tr>
                <td>Image</td>
				<td>Name</td>
                <td>Action</td>
               
            </tr> 
        </thead>
        <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
    $name=$row["college_name"];
	$id=$row["college_id"];
	$fees=$row["fees"];
	$img=$row["image_name"];
	echo '<tr><td><img src="../images/'.$img.'" height="150" width="200"></td>
            <td>'.$name.'</td>
			<td><form action="update1.php" method="get">	
            <input type="hidden" name="id" value="'.$id.'" />			
			<input type="submit" formtarget="_blank" name="update"style="width:55px;" value="Update" /></form><br>
			<form action="" method="post">
			<input type="hidden" name="id" value="'.$id.'" />			
			<input type="submit" style="width:55px;" name="delete" value="Delete" />
			</form>
</td></tr>';


    }
} else {
	
    echo "Sorry 0 Results";
}
  echo '</tbody>
</table>'; 
   }
   
   
   else{
	   $sname=$_POST["name"];
	   $ret="select distinct college_name,college_id from college_cutoff,college_info where college_name='$sname' or college_id='$sname'";
$result1 = mysqli_query($conn,$ret);
	if (mysqli_num_rows($result1) > 0) {	
		echo '<table>
        <thead>
            <tr>
              
				<td>Name</td>
                <td>Action</td>
               
            </tr> 
        </thead>
        <tbody>';
    while($row1 = mysqli_fetch_assoc($result1)) {
    $name=$row1["college_name"];
	$id=$row1["college_id"];

	$img=$row1["image_name"];
	echo '<tr>
            <td>'.$name.'</td>
			<td><td><form action="update1.php" method="get">	
            <input type="hidden" name="id" value="'.$id.'" />			
			<input type="submit" name="update" formtarget="_blank" style="width:55px;"  value="Update" /></form></td><td>
			<form action="" method="post">
			<input type="hidden" name="id" value="'.$id.'" />			
			<input type="submit" style="width:55px;" name="delete" value="Delete" />
			</form></td></tr>';


    }
} else {
	
    echo "Sorry 0 Results";
}
  echo '</tbody>
</table>';  
}
   
   if (isset($_GET['id'])) {
	 
	
    //runMyFunction();
  }
else{
	//echo "zerovskj";
}  
if(isset($_POST["delete"]))
{
	
	
		$cid=$_POST['id'];
		$del="DELETE FROM `college_info1` WHERE coll_id='$cid'";
	if(mysqli_query($conn, $del)){
		
		echo '<script>alert("Row Deleted")</script>';
 echo '<script>window.location="u.php?id=8"</script>';
 exit();
	}

else{
		echo '<script>alert("Not Deleted")</script>';
	}
}	


		
		
		
		
	
?>


 </body>
</html>
