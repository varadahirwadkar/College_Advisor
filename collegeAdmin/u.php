<?php
session_start();
 if(!isset($_SESSION['login_user'])){

		header ("location:../homePage.php");
  } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
			<link rel="stylesheet" href="../css/menu.css" type="text/css" media="all" />
  <style>

        </style>
<script>

</script>
    </head>
    
        <body>
		
 <h1 align="center"><font face="Comic Sans MS"color="#008000"size="10">C</font><font color="black">ollege </font><font face="Comic Sans MS"color="#008000"size="10">A</font><font color="black">dvsior.</font> </h1> 
	  <ul>

           <li><a href="u.php?id=1">Data Modification</a></li>
		    <li><a href="u.php?id=2">Delete</a></li>
		   <li><?php echo $_SESSION['login_user']; ?>
		   <ul><li><a href="u.php?id=3">Profile</a></li>
		   <li><a href="u.php?id=4">Signout</a></li>
</ul></li>
       </ul>
	   
	   <?php
	         if(isset($_GET['id']))
			 {

				 if($_GET['id']==1)
				 {
					 include('update1.php');
				 }
				 if($_GET['id']==2)
				 {
					 include('delete.php');
				 }
				 if($_GET['id']==3)
				 {
					 include('profile.php');
				 }
				 if($_GET['id']==4)
				 {
					 include('../signout.php');
				 }
				 
			 }
	   ?>