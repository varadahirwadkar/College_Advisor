
<?php 
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 }
  $uid=  $_SESSION['login_id'];
  global $uid;
 
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
  

   $sql =  "SELECT * from college_info where coll_id='$uid'";
   
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
				
            <input type="hidden" name="id" value="'.$id.'" />			
			<form action="" method="post">
			<input type="hidden" name="id" value="'.$id.'" />			
			<td><input type="submit" style="width:55px;" name="delete" value="Delete" /></td>
			</form>
</td></tr>';
	}

    }
 else {
	
    echo "Sorry 0 Results";
}
  echo '</tbody>
</table>'; 
   


  
if(isset($_POST["delete"]))
{
	
	
		$cid=$_POST['id'];
		$del="DELETE FROM `college_info` WHERE coll_id='$uid'";
	if(mysqli_query($conn, $del)){
		
		echo '<script>alert("Row Deleted")</script>';
 echo '<script>window.location="u.php?id=2"</script>';
 exit();
	}

else{
		echo '<script>alert("Not Deleted")</script>';
	}
}	

?>


 </body>
</html>
