<?php 
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();
if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 }  $uid= $_SESSION['login_id'];
  global $uid;
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
 <style>
  a{
                
                color: white;
                text-decoration: none;
                display: block;
            }
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
//echo $uid;
            $id=  $_GET["id"];
			$name=$_POST["name"];
			$department=$_POST["department"];
	

 $wish="select * from wishlist where user_id='$uid'";
 $coll="select * from college_cutoff where college_id='$id'";
           $ins="insert into wishlist (coll_id,user_id) values('$id','$uid') ";
if(isset($_POST['add'])){
if (mysqli_query($conn, $ins)) {

}
else {
	echo "not inserted";
}}else{
//echo "not add";
}
$result = mysqli_query($conn, $wish);
//$result1 = mysqli_query($conn, $wish);
	//$row = mysqli_fetch_assoc($result1);
	//$name
if (mysqli_num_rows($result) > 0) {
   echo '<table cellspacing="20px">
        <thead>
             <tr>

                <th>College ID<hr></th>
				<th>College Name<hr></th>
			   <th colspan="2">Mobile No<hr></th>
			   <th></th><th>Action<hr></th>
               
            </tr>  
        </thead>
        <tbody>';
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$col=$row['coll_id'];
 $coll="SELECT * from college_info i, college_cutoff f where i.coll_id= f.college_id and i.coll_id='$col' GROUP by coll_id";
 
$result1 = mysqli_query($conn, $coll);		
$row1 = mysqli_fetch_assoc($result1);				   
         echo '<tr> <form method="post" action="">
                         <td>'.$row['coll_id'].'</td>
					  <td><a target="_blank" href="college.php?id='.$row['coll_id'].'">'.$row1['college_name'].'</td>
					   <td>'.$row1['min'].'</td>
					    <td>'.$row1['max'].'</td>
					  <td> <input type="hidden" name="del" value="'.$row['wid'].'" /></td>
					  <td><input type="submit"class="btn" name="delete" value="Delete" /></td>
</form>


        </tr>';
	
	}			
} else{
	echo "Not having Wishlist college";
}
echo '
    </tbody>
</table>';
  
if(isset($_POST['delete']))
{

$id= $_POST['del'];



$del="DELETE FROM wishlist WHERE wid='$id'";
	if(mysqli_query($conn, $del)){
		
		echo '<script>alert("Row Deleted")</script>';
		header("Location:u.php?id=5");
		exit();
       
	}

else{
		echo '<script>alert("Not Deleted")</script>';
	}

}
?>     
   
  

    </body>
</html>