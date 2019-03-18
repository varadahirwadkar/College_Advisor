<?php 

session_start();
if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } elseif($_SESSION['login_user']!=="varadq"){
		echo '<script>alert("Sign in as Admin")</script>';
  }
 $uid= $_SESSION['login_id'];
  global $uid;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>

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
global $conn;
$uid=$_GET['id'];
//echo $uid;
 $sql = "SELECT * FROM college_cutoff1 where college_id='$uid'";
 $query1 = "SELECT * FROM college_info1 where coll_id='$uid'";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql);
$tab = mysqli_query($conn, $query1);
//mysqli_query($sql, $sql1);
echo "Information Table";
//Update For info
if (mysqli_num_rows($tab) > 0)  {
    // output data of each row
	echo '<table cellspacing="20px">
        <thead>
             <tr>

                <th>College ID<hr></th>
				<th>College Fees<hr></th>
                <th>College Type<hr></th>
               
            </tr>  
        </thead>
        <tbody>';
    while($row2 = mysqli_fetch_assoc($tab)) {
    $colid=$row2["coll_id"];
	
	//echo $colid;
	
	echo '<tr>
       
            <form method="post" action="update1.php">
									<td><input type="text" name="inputid" value="'.$row2['image'].'" /></td>

						<td><input type="text" name="inputid" value="'.$colid.'" /></td>
						<td><input type="text" name="fees" value="'.$row2['fees'].'" /></td>
						<td><input type="text" name="type" value="'.$row2['type'].'" /></td>
						<td> <input type="hidden" name="hid1" value="'.$row1['id'].'" /></td>
						<td><input type="hidden" name="dbid" value="'.$colid.'" /></td>

			<td><input type="submit" name="update2" style="margin-top:5px;" width="250px" value="Update" /></td>
</form>
        </tr>';


    }
} else {
	
    echo "Sorry 0 Results";
}
  echo '</tbody>
</table>';
$row1 = mysqli_fetch_assoc($result1);
$name=$row1['college_name'];
	$colid=$row1['college_id'];
	echo "Cutoff Table";
echo '		<table cellspacing="20px">
        <thead>
            <tr>

                <th>College ID<hr></th>
	
               			<th>College Name<hr></th><th></th><th></th>	<th>Action<hr></th>

            </tr></thead> <tr>
<form method="post" action="update1.php">
						<td>'.$colid.'</td>
                       <td> <input type="text" name="college_name" value="'.$row1['college_name'].'" /></td>
					   <td> <input type="hidden" name="department" value="'.$row1['department'].'" /></td>
					   	<td> <input type="hidden" name="id" value="'.$row1['college_id'].'" /></td>
						<td> <input type="hidden" name="hid" value="'.$row1['id'].'" /></td>
						<td><input type="submit" name="update_name" value="Update" /></td>
</form>
       </tr>
	   </table>';

	   echo '<table cellspacing="20px">
        <thead>
            <tr>

                <th>Department<hr></th>
				
				
                <th colspan="2">Cuttoff Min-Max<hr></th>
               			<th></th><th></th>	<th>Action<hr></th>

            </tr> 
        </thead>
        <tbody>';

		
if (mysqli_num_rows($result) > 0) {
   
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $name=$row['college_name'];
	$colid=$row['college_id'];
	 // $_SESSION['cnmae']=$row['college_name'];
	
	echo '<tr>
       
           <form action="update1.php" method="post">
						<td><input type="text" name="department" value="'.$row['department'].'" /></td>
						<td><input  name="min" value="'.$row['min'].'" /></td>
						<td><input type="text" name="max" value="'.$row['max'].'" /></td>
						<td><input type="hidden" name="department1" value="'.$row['department'].'" /></td>
						<td><input type="hidden" name="collegeid1" value="'.$row['college_id'].'" /></td>

			<td><input type="submit" name="update1" style="margin-top:5px;" width="250px" value="Update" /></td>
</form>
        </tr>';
	
	}			
} 
echo 'Department:CIVIL<br>
min:<input type="float" name="min1"/>max:<input type="float" name="max1" /><br>

    </tbody>
</table>';


if(isset($_POST['update_name']))
{

$hid = $_POST['hid'];
$colid = $_POST['college_id'];
$id = $_POST['id'];
$name = $_POST['college_name'];
//$torsdag = $_POST['torsdagid'];
//$fredag = $_POST['fredagid'];
echo $colid;
$sql1 = "UPDATE college_cutoff1 SET college_name='$name' WHERE college_id='$id'";

$retval = mysqli_query($conn, $sql1);
if( $retval )
{
 echo '<script>window.location="update1.php?id='.$colid.'"</script>';
}else{

echo "not updated";
}

}

if(isset($_POST['update1']))
{
	//db values
$colid = $_POST['collegeid1'];
$department1 = $_POST['department1'];
$max = $_POST['max'];
$min = $_POST['min'];
$department = $_POST['department'];
//$torsdag = $_POST['torsdagid'];
//$fredag = $_POST['fredagid'];
echo $colid;
$sql1 = "UPDATE college_cutoff1 SET department='$department',max='$max',min='$min' WHERE college_id='$colid' and department='$department1'";

$retval = mysqli_query($conn, $sql1);
if( $retval )
{
 echo "Updated vcbxdata successfully\n";

				echo '<script>window.location="update1.php?id='.$colid.'"</script>';
}else{

echo "not updated";
}

}

if(isset($_POST['update2']))
{
//db values
$dbid = $_POST['dbid'];
$hid1 = $_POST['hid1'];

$fees = $_POST['fees'];
$type = $_POST['type'];
$inputid = $_POST['inputid'];

$sql3 = "UPDATE college_info1 SET coll_id='$inputid',fees='$fees',type='$type' WHERE coll_id='$dbid'";

$retval = mysqli_query($conn, $sql3);
if( $retval )
{
 echo "Updated vcbxdata successfully\n";
 echo '<script>window.location="update1.php?id='.$inputid.'"</script>';
}else{

echo "not updated";
}

}

?>
       
   
  

    </body>
</html>