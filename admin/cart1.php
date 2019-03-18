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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
        <title>Update</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">  
			<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all" />
  <style>
	
	body{
		background-size:cover;	
        
	}
    .result{
		background-color: rgba(255, 255, 255, 0.4);
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
	
	<body background="../images/b.jpg" style="background-opacity:0.5;">
	
     <h1 align="center"><font face="Comic Sans MS"color="#008000"size="10">C</font><font color="black">ollege </font><font face="Comic Sans MS"color="#008000"size="10">A</font><font color="black">dvsior.</font> </h1>
       <ul>
	    <li>Insert
		   <ul><li><a href="u.php?id=6">insert cutoff</a></li>
		   <li><a href="u.php?id=7">insert info</a></li>
</ul></li>
<li>Retrive and Update
		   <ul><li><a href="u.php?id=9">User Profiles</a></li>
		   <li><a href="u.php?id=8">Retrive</a></li>
</ul></li>


           <li><a href="u.php?id=1">Home</a></li>
		   <li><a href="u.php?id=2">Choose College</a></li>
		   		   <li><?php echo $_SESSION['login_user']; ?>
		   <ul><li><a href="u.php?id=5">Profile</a></li>
		   <li><a href="u.php?id=4">Signout</a></li>
		   
</ul></li>
       </ul>
	   
  
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
	

 $wish="select * from wishlist where coll_id='$id' and user_id='$uid'";
 //$coll="select * from college_cutoff where college_id='$id'";
  $ins="insert into wishlist (coll_id,user_id) values('$id','$uid') ";
if(isset($_POST['add']))
{
	   $result3 = mysqli_query($conn, $wish);
	   if(mysqli_num_rows($result3)==0){
	    
			//echo $id;
		   $insert=mysqli_query($conn, $ins);        
}
else{
		echo '<script>alert(College Already Present in wishlist")</script>';

}}
 $wish1="select * from wishlist where user_id='$uid'";

$result = mysqli_query($conn, $wish1);

echo '<p align="center"><font size="8" color=#008000>Y</font><font size="6">our </font><font size="8" color=#008000>W</font><font size="6">hislist</font></p>';
if (mysqli_num_rows($result) > 0) {
   echo '<table class="result" cellspacing="20px" width="100%">
        <thead>
             <tr>

                <th>College ID<hr></th>
				<th>College Name<hr></th>
			   
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
         echo '<tr align="center"> <form method="post" action="cart1.php">
                         <td>'.$row['coll_id'].'</td>
					  <td><a target="_blank" href="college.php?id='.$row['coll_id'].'">'.$row1['college_name'].'</td>
					    <td> <input type="hidden" name="del" value="'.$row['wid'].'" /></td>
					  <td><input class="btn"type="submit" name="delete" value="Delete" /></td>
</form>


        </tr>';
	
	}			
} else{
	echo "not wish";
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
		 echo '<script>window.location="cart1.php"</script>';

	}

else{
		echo '<script>alert("Not Deleted")</script>';
	}

}
?>     
   
  

    </body>
</html>