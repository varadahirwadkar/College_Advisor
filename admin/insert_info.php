<?php 
 error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );

session_start();
if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } elseif($_SESSION['login_user']!=="varadq"){
		echo '<script>alert("Sign in as Admin")</script>';
  }
 
 include('menu.php');?> 
<!DOCTYPE html>
<html lang="en">
<style>
.left{
	width:40%;
	position:static;
	border:2px solid blue;
	height:100%;
}
.right{
	float:right;
	width:50%;
	position:static;
	border:2px solid blue;
	
}

.instlbl{
	
	text-align:left;
	
}
.insttext{
	
	text-align:left;
	
}

</style>
<body>
    <form action="" method="post" enctype="multipart/form-data">
	<table>
	<tr><th class="instlbl">ID:</th><th class="insttext"><input  name="coll_id" type="number"></th></tr>
	<tr><th class="instlbl">Location:</th><th class="insttext"><input  name="location" type="text" required=""></th></tr>
	<tr><th class="instlbl">Placement:</th><th class="insttext"><textarea  name="Placement" placeholder="Write something.." style="height:80px;width:500px;"></textarea></th></tr>
    <tr><th class="instlbl">Infrastructure:</th><th class="insttext">  <textarea  name="Infrastructure" placeholder="Write something.." style="height:80px;width:500px;"></textarea></th></tr>
    <tr><th class="instlbl">Faculty:</th><th class="insttext"><textarea  name="Faculty" placeholder="Write something.." style="height:80px;width:500px;"></textarea><br></th></tr>
    <tr><th class="instlbl">Other:</th><th class="insttext"><textarea  name="Other" placeholder="Write something.." style="height:80px;width:500px;"></textarea><br></th></tr>
    <tr><th class="instlbl">Type:</th><th class="insttext"><textarea  name="typea" placeholder="Write something.." style="height:70px;width:500px;"></textarea><br></th></tr>
    <tr><th class="instlbl">Fees:</th><th class="insttext"><input  name="fees" type="number"></th></tr>
    <tr><th class="instlbl">Select image to upload:</th><th class="insttext"><input type="text" name="image"/></th></tr>
	  </table>
	  <center>
	  <input type="submit" name="submit" value="UPLOAD"/>
      </center>
	</form>
</body>
</html>

<?php
if(isset($_POST["submit"])){

        $image = $_POST["image"];
      
$coll_id=$_POST["coll_id"];
$location=$_POST["location"];
$placement=$_POST["Placement"];
$infra=$_POST["Infrastructure"];
$faculty=$_POST["Faculty"];
$other=$_POST["Other"];
$type=$_POST["typea"];
$fees=$_POST["fees"];

        /*
         * Insert image data into database
         */
 
        
        //Create connection and select DB
 $link = mysqli_connect('localhost','root','','college');         
 
        
        //Insert image content into database
        $insert = "INSERT into college_info1 (coll_id,image_name,location,type,placement,infra,faculty,other,fees) VALUES ('$coll_id','$image','$location','$type','$placement','$infra','$faculty','$other','$fees')";
       if (mysqli_query($link, $insert)) {
			echo "Sucess4!";
		}
   
}
?>