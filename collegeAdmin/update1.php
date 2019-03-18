<?php 
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();
if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } 
 $uid=  $_SESSION['login_id'];
  global $uid;
  //echo $uid;

?>
<!DOCTYPE html>
<html>
<style>
td{
	padding:10px 10px 10px 10px;
	}
	.uplbl{
		text-align:center;
	}
	.uptxt{
		text-align:center;
		
	}
	.updttxt{
		width:250px;
		height:30px;
	}
	.uptxt2{
		height:25px;		
	}
</style>

    <head>
        <title>Update</title>

    </head>
    
        <body>

  
<?php

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
//$uid=$_GET['id'];
//echo $uid;
 $sql = "SELECT * FROM college_cutoff where college_id='$uid'";
 $query1 = "SELECT * FROM college_info where coll_id='$uid'";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql);
$tab = mysqli_query($conn, $query1);
//mysqli_query($sql, $sql1);

//Update For info
if (mysqli_num_rows($tab) > 0)  {
    // output data of each row
	echo '<table cellspacing="20px">

        <tbody>';
    $row2 = mysqli_fetch_assoc($tab);
    $colid=$row2["coll_id"];
	
	//echo $colid;
	
	echo '
       
            <form method="post" action="update1.php">
					<tr><td>College ID:<input class="uptxt2" type="text" name="inputid" value="'.$colid.'" />
					<td class="uptxt">College Name:<input class="updttxt" type="text" name="college_name" value="'.$row2['college_name'].'" /></td>
						
						<td>Fees:<input class="uptxt2" type="text" name="fees" value="'.$row2['fees'].'" /></td></tr>
						<tr><td></td><td class="uplbl"><img src="../images/'.$row2['image_name'].'" height="225" width="400"></td>
						</tr>
						<tr><td class="uplbl">Image:</td><td><input class="updttxt" type="text" name="image_name" value="'.$row2['image_name'].'" /></td></tr>
						<tr>
						<td class="uplbl">Type:</td><td><textarea rows="2" cols=32" name="type" >'.$row2['type'].'</textarea></td></tr>
						
						
						
						
					    <tr><td class="uplbl">Placement:</td><td><textarea rows="8" cols="80" name="placement" >'.$row2['placement'].'</textarea></td></tr>
					    <tr><td class="uplbl">Infrastructire:</td><td><textarea rows="8" cols="80" name="infra" >'.$row2['infra'].'</textarea></td></tr>
					    <tr><td class="uplbl">Faculty:</td><td><textarea rows="8" cols="80" name="faculty" >'.$row2['faculty'].'</textarea></td><br></tr>
					    <tr><td class="uplbl">Other:</td><td><textarea rows="8" cols="80" name="other" >'.$row2['other'].'</textarea></td><br></tr>

						<tr><td> <input type="hidden" name="hid1" value="'.$row1['id'].'" /></td>
						<td><input type="hidden" name="dbid" value="'.$colid.'" /></td></tr>
<tr>
			<td><input type="submit" name="update2" style="margin-top:5px;" width="250px" value="Update" /></td>

        </tr></form>';


    
} else {
	
    echo "Sorry College Not Present";
}
  echo '</tbody>
</table>';


	 

		
if (mysqli_num_rows($result) > 0) {
     echo '<table cellspacing="20px">
        <thead>
            <tr>

                <th>Department<hr></th>
				
				  <th>Placement<hr></th>
                <th colspan="2">Cuttoff Min-Max<hr></th>
				
               			<th></th>

            </tr> 
        </thead>
        <tbody>';
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $name=$row['college_name'];
	$colid=$row['college_id'];
	global $colid;
	 // $_SESSION['cnmae']=$row['college_name'];
	
	echo '<tr>
       
           <form action="" method="post">
						<td><input type="text" name="department" value="'.$row['department'].'" /></td>
						<td><input type="number" min="1" max="100" name="place_per" value="'.$row['place_per'].'" /></td>
						<td><input type="number" min="1" max="100" step="any" name="min" value="'.$row['min'].'" /></td>
						<td><input min="1" max="100" step="any" name="max" value="'.$row['max'].'" /></td>
						<td><input type="hidden" name="department1" value="'.$row['department'].'" /></td>
						<td><input type="hidden" name="collegeid1" value="'.$row['college_id'].'" /></td>
						<td><input type="submit" name="update1" style="margin-top:5px;" width="250px" value="Update" /></td>
						<td><input type="submit" style="width:55px;" name="delete" value="Delete" /></td>

</form>
        </tr>';


	
	}	
echo '<tr><td> Add a New Department:</td></tr><br>
                       <tr> <form action="" method="post">
						<td><input type="text" name="department"  /></td>
						<td><input type="text" name="place_per" /></td>
						<td><input  name="min" value="'.$row['min'].'" /></td>
						<td><input type="text" name="max" value="'.$row['max'].'" /></td>
						<td><input type="hidden" name="collegeid1" value="'.$colid.'" /></td>

						<td><input type="submit" name="insert" style="margin-top:5px;" width="250px" value="Add new Department" /></td>
</form>
</tr>
    </tbody>
</table>';
	
} 


echo $_POST['collegeid1'];

if(isset($_POST['update1']))
{
	//db values
$colid = $_POST['collegeid1'];
$department1 = $_POST['department1'];
$max = $_POST['max'];
$min = $_POST['min'];
$place_per = $_POST['place_per'];
$department = $_POST['department'];
//$torsdag = $_POST['torsdagid'];
//$fredag = $_POST['fredagid'];
echo $colid;
$sql1 = "UPDATE college_cutoff SET department='$department',place_per ='$place_per',max='$max',min='$min' WHERE college_id='$colid' and department='$department1'";

$retval = mysqli_query($conn, $sql1);
if( $retval )
{
 echo "Updated vcbxdata successfully\n";

				echo '<script>window.location="u.php?id=1"</script>';
}else{

echo "not updated";
}

}

if(isset($_POST['update2']))
{
//db values
$dbid = $_POST['dbid'];
$hid1 = $_POST['hid1'];
$collname=$_POST['college_name'];
$fees = $_POST['fees'];
$type = $_POST['type'];
$other = $_POST['other'];
$inputid = $_POST['inputid'];
$image=$_POST['image_name'];

$sql3 = "UPDATE college_info SET coll_id='$inputid',image_name='$image',college_name='$collname',fees='$fees',type='$type',other='$other' WHERE coll_id='$dbid'";

$retval = mysqli_query($conn, $sql3);
if( $retval )
{
 echo "Updated vcbxdata successfully\n";
 echo '<script>window.location="u.php?id=1"</script>';
}else{

echo "not updated";
}

}

if(isset($_POST['insert']))
{
//db values
$colid = $_POST['collegeid1'];
$max1 = $_POST['max'];
$min1 = $_POST['min'];
$place_per = $_POST['place_per'];
$department = $_POST['department'];

$insert = "INSERT INTO `college_cutoff` ( `college_id`, `department`, `min`, `max`,`place_per`) VALUES ('$colid', '$department', '$min1', '$max1','$place_per')";

$retval1 = mysqli_query($conn, $insert);
if( $retval1 )
{
echo '<script>alert("Department Insertted")</script>';
 echo '<script>window.location="u.php?id=1"</script>';
}else{

echo '<script>alert("Not inserted")</script>';
}

}

?>
       
   
  

    </body>
</html>