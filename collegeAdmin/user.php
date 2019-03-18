<?php
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
	   $uid=  $_SESSION['login_id'];
  global $uid;
 } 
  ?>
<!DOCTYPE html>
<html>

    
        <body>

	
<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );


 include('menu.php');

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
$uid = $_SESSION['login_user'];
$id = $_SESSION['login_id'];
 $sql = "SELECT * FROM collegeadmin where college_id='$id'";


$result = mysqli_query($conn, $sql);

	
if (mysqli_num_rows($result) > 0) {
   echo '<table cellspacing="20px">
        <thead>
             <tr>

              
				<th></th>
                <th>Email<hr></th>
				<th>Mobile No<hr></th>
				<th>Password<hr></th>
               
            </tr>  
        </thead>
        <tbody>';
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
	echo '<tr>
       
          <form method="post" action="user.php">
						<td>'.$row['id'].'</td>
						<td><input type="text" name="email" value="'.$row['email'].'" /></td>
						<td><input type="text" name="mobile" value="'.$row['mobile'].'" /></td>
						<td> <input type="password" name="password" value="'.$row['password'].'" /></td>
						<td><input type="hidden" name="upd" value="'.$row['college_id'].'" /></td>
					    <td><input type="submit" name="updt" value="Update" /></td>
						<td><input type="submit" name="delete" value="Delete Account" /></td>
</form>';
	
	}			
} 
echo '    


        </tr>
    </tbody>
</table>';
  
if(isset($_POST['updt']))
{

$upd= $_POST['upd'];
$email= $_POST['email'];
$mobile= $_POST['mobile'];
$password= $_POST['password'];

echo $upd;
echo $name;
echo $email;
echo $password;

$del="UPDATE collegeadmin SET email='$email',mobile='$mobile',password='$password' WHERE college_id='$upd'";
	if(mysqli_query($conn, $del)){
		
		
echo '<script>alert("Row Updated")</script>';
		echo '<script>window.location="u.php?id=3"</script>';
		echo "updated";

	}

else{
		echo '<script>alert("Not Updated")</script>';
	}

}
if(isset($_POST['delete']))
{

$upd= $_POST['upd'];


$del="delete from collegeadmin WHERE college_id='$upd'";
	if(mysqli_query($conn, $del)){
		
		
echo '<script>alert("Row Deleted")</script>';
		header("Location:../signout.php");
		exit();

	}

else{
		echo '<script>alert("Sorry Your account not deleted!")</script>';
	}

}
?>     
   
  

    </body>
</html>