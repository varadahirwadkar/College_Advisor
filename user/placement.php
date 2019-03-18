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
			<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all" />
			<link rel="stylesheet" href="../css/choose.css" type="text/css" media="all" />
<style>
input[type="checkbox"]  {
	display: inline-block;
	height: 19px;
	width: 19px;
	vertical-align: middle;
	cursor: pointer;
	margin-left:0px;
}
.left{

	background:white;
	position:static;
	float:left;
	
}
select{
	height:35px;
	background-color:grey;
	font-size: 20px;
	color:white;
}


.show{
	
	width:55%;
	float:right;
	display:inline-block;
}
.main:after{
	clear:both;
	display:block;
	content:"";
}
</style>

    </head>
    
        <body>

	   <br>
	 <?php
	
    if (isset($_POST['check_list']))
    {
        foreach ($_POST['check_list'] as $selectednumber)
            $selected[$selectednumber] = "checked";
    }
?>
	 
		<div class="test">
	   <div class="left">
	    <form action="" method="post">
          
<label >Select Your Course :(you can select max 2)</label><br>
<input type="checkbox" name="check_list[]" value="IT" <?php echo $selected['IT'] ?> ><label>IT</label><br>
<input type="checkbox" name="check_list[]" value="COMP" <?php echo $selected['COMP'] ?>><label>COMP</label><br>
<input type="checkbox" name="check_list[]" value="EE" <?php echo $selected['EE'] ?>><label>EE</label><br>
<input type="checkbox" name="check_list[]" value="ENTC" <?php echo $selected['ENTC'] ?>><label>ENTC</label><br>
<input type="checkbox" name="check_list[]" value="MECH" <?php echo $selected['MECH'] ?>><label>MECH</label>	<br>
<input type="checkbox" name="check_list[]" value="CIVIL" <?php echo $selected['CIVIL'] ?>><label>CIVIL</label><br>		  
	 <br>
     		<label> EnterPercentage:</label>
	     	<input type="float" value="<?php echo isset($_POST['percent']) ? $_POST['percent'] : '' ?>" name="percent" placeholder="Enter percent"/><br>
		    <br>

			<label>College Fees:</label><br>
            <div class="custom" >
           
		       <select name="FeesMax" id="varad">
               <option value="-1" selected>Maximum Fees</option>
               <option value="1">100000 </option>
			   <option value="2">150000 </option>
               <option value="3">200000</option>
               <option value="4">300000</option>
               <option value="5">Above Rs.300000</option>
                           </select><br><br>
</div>
		<label>College Placement:</label><br>
            <div class="custom" >
           
		       <select name="placement1" id="place">
               <option value="1" selected>Select Placement %</option>
               <option value="2">100%</option>
			   <option value="3">90% </option>
               <option value="4">80%</option>
               <option value="5">60%</option>
               <option value="6">50%</option>
                           </select><br><br>
</div>
  
                <input type="submit" value="submit"  name="submit" />
		    
		   
		    
        </form>		
</div>
       <br>
	 <label>
<div class="show">
<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

if(isset($_POST['submit'])){

// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);

// Loop to store and display values of individual checked checkbox.
$a=$_POST['check_list'];
$dep=$a[0];
$dep2=$a[1];

$per_min=$_POST['percent']-5;
$per_max=$_POST['percent']+1;


$max = array('100000', '100000','150000', '200000', '300000','1000000');
$place = array('0', '100','90', '80', '60','50');
$placeper = $place[$_POST['placement1']];

$fees2 = $max[$_POST['FeesMax']];

 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";
if(!empty($_POST['check_list']) && !empty($_POST['percent']) ) {
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

 $sql = "SELECT  * FROM college_cutoff cut,college_info inf WHERE (cut.department='$dep' or cut.department='$dep2')
 and ((cut.min >'$per_min') and (cut.max <'$per_max')) and
 (inf.fees < '$fees2') and cut.college_id=inf.coll_id";
//$sql = "select * from college_cutoff where (department='$dep' or department='$dep2') and ((min >'$per_min') and (max <'$per_max')) union select * from college_info where ((fees > '$fees1' ) or (fees between '$fees1' and '$fees2'))";
   //$sql = "SELECT  * FROM college_cutoff cut left outer join college_info inf WHERE ((cut.department='$dep' or cut.department='$dep2') and ((cut.min >'$per_min') and (cut.max <'$per_max'))) and (inf.fees > '$fees1' ) union select * from college_cutoff cut right outer join college_info where (inf.fees between '$fees1' and '$fees2')";

$result = mysqli_query($conn, $sql);
//mysqli_query($sql, $sql1);
if (mysqli_num_rows($result) > 0) {
echo '<table cellspacing="20px" width:40% float:right>
        <thead>
            <tr>

                <th>College<hr></th>
				<th>Department<hr></th>
                <th colspan="2">Cuttoff<hr></th>
               
            </tr> 
        </thead>
        <tbody>';
		

   
// output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $name=$row['college_name'];
	$colid=$row['college_id'];
	 // $_SESSION['cnmae']=$row['college_name'];
	
	echo '<tr>
            <td><a target="_blank" href="college.php?id='.$colid.'">'.$name.'</a></td>
             <td>'.$row['department'].'</td>           
		   <td>'.$row['min'].'</td>
            <td>'.$row['max'].'</td>
            <td><form method="post" action="cart1.php?action=add&id='.$colid.'">
									<input type="hidden" name="name" value="'.$name.'" />
									<input type="hidden" name="department" value="'.$row['department'].'" />
									<input type="hidden" name="username" value="'.$_SESSION['login_user'].'" />

			<input type="submit" name="add" formtarget="_blank" style="margin-top:5px;" width="250px" value="Add to Wishlist" /></td>
</form>
        </tr>';
	
	}			
}else{
	echo "Sorry College data not present ";
} 


}else {
	
    echo '<p align="center">Please Select Department and Enter %';
}

echo '
    </tbody>
</table>';


  
 
}
  



?>
</div>
</label></div>
       
   

	 
	 
    </body>
	<div class="footer">
	 <?php include('footer.html'); ?>
	 </div>
	 
	
</html>