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
           <li><a href="u.php?id=1">Home</a></li>
		   <li><a href="u.php?id=2">Choose College</a></li>
           <li><a href="u.php?id=3">Feedback</a></li>
		    <li><a href="u.php?id=4">About</a></li>
		   <li><?php echo $_SESSION['login_user']; ?>
		   <ul><li><a href="u.php?id=5">Profile</a></li>
		   <li><a href="u.php?id=6">Signout</a></li>
</ul></li>
       </ul>
	   
	   <?php
	         if(isset($_GET['id']))
			 {
				 if($_GET['id']=='1')
				 {
					 include('home.php');
				 }
				 if($_GET['id']=="2")
				 {
					 include('choose.php');
				 }
				 if($_GET['id']==3)
				 {
					 include('feedback.php');
				 }
				 if($_GET['id']==4)
				 {
					 include('about.php');
				 }
				 if($_GET['id']==5)
				 {
					 include('profile.php');
				 }
				 if($_GET['id']==6)
				 {
					 include('signout.php');
				 }
				 
			 }
	   ?>