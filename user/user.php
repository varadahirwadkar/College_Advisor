<?php 
session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } 
  

 ?>
<!DOCTYPE html>
<html>

    <style>
	
		.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}
	
	.btn:hover {
    background-color: RoyalBlue;
}
</style>
        <body>

  
<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();


$id=$_SESSION['login_id'];
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
 $sql = "SELECT * FROM student where id='$id'";


$result = mysqli_query($conn, $sql);

	
if (mysqli_num_rows($result) > 0) {
   echo '<table cellspacing="20px">
        <thead>
             <tr>

                <th>ID<hr></th>
				<th>Name<hr></th>
                <th>Email<hr></th>
				<th>Mobile<hr></th>
				<th>Password<hr></th>
               
            </tr>  
        </thead>
        <tbody>';
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
	echo '<tr>
       
          <form method="post" action="">
						<td>'.$row['id'].'</td>
                        <td><input type="text" name="name" value="'.$row['name'].'" /></td>						
						<td><input type="text" name="email" value="'.$row['email'].'" /></td>
						<td><input type="text" name="percent" value="'.$row['mobile'].'" /></td>
						<td> <input type="password" name="pass" value="'.$row['password'].'" /></td>
						<td><input type="hidden" name="upd" value="'.$row['id'].'" /></td>
					    <td><input type="submit" class="btn" name="updt" value="Update" /></td>';

	
	}			
} 
echo'
	<td><input type="submit" class="btn" name="delete" value="Delete Profile /></td>
 </form>      </tr>
    </tbody>
</table>';
  
if(isset($_POST['updt']))
{

$upd= $_POST['upd'];
$name= $_POST['name'];
$percent= $_POST['percent'];
$password= $_POST['pass'];
$email= $_POST['email'];
echo $upd;
echo $name;
echo $email;
echo $password;

$del="UPDATE student SET name='$name',mobile='$percent',email='$email',password='$password' WHERE id='$upd'";
	if(mysqli_query($conn, $del)){
		
		
echo '<script>alert("Row Updated")</script>';
		header("Location:u.php?id=5");
		exit();

	}

else{
		echo '<script>alert("Not Updated")</script>';
	}

}
if(isset($_POST['delete']))
{

$upd= $_POST['upd'];



$del="delete from student where id='$upd'";
	if(mysqli_query($conn, $del)){
		
		
echo '<script>alert("Row Deleted")</script>';
		header("Location:u.php?id=5");
		exit();

	}

else{
		echo '<script>alert("Sorry Your account not deleted!")</script>';
	}

}
?>     
   
  

    </body>
</html>