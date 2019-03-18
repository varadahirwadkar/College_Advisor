<?php 
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();
if(!isset($_SESSION['login_user'])){
     header ("location:homePage.php");
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

 $sql = "SELECT * FROM student";


$result = mysqli_query($conn, $sql);

	
if (mysqli_num_rows($result) > 0) {
   echo '<table cellspacing="20px">
        <thead>
             <tr>

                <th>ID<hr></th>
				<th>Name<hr></th>
                <th>Email<hr></th>
				<th>Mobile No<hr></th>
               
            </tr>  
        </thead>
        <tbody>';
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	
	echo '<tr>
       
          <form method="post" action="">
                         <td>'.$row['id'].'</td>   
						<td>'.$row['name'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['mobile'].'%</td>
						<td> <input type="hidden" name="del" value="'.$row['id'].'" /></td>
					  <td><input type="submit" name="delete"  value="Delete" /></td>
</form>


        </tr>';
	
	}			
} 
echo '
    </tbody>
</table>';
  
if(isset($_POST['delete']))
{

$id= $_POST['del'];



$del="DELETE FROM student WHERE id='$id'";
	if(mysqli_query($conn, $del)){
		
		echo '<script>alert("Row Deleted")</script>';
		 echo '<script>window.location="u.php?id=9"</script>';

	}

else{
		echo '<script>alert("Not Deleted")</script>';
	}

}
?>     
   
  

    </body>
</html>