<?php 
session_start();

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	 exit();
 } elseif($_SESSION['login_user']!=="varadq"){
		echo '<script>alert("Sign in as Admin")</script>';
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
	         if(isset($_GET['id']))
			 {
				 if($_GET['id']==1)
				 {
					 include('../user/home.php');
				 }
				 if($_GET['id']=="2")
				 {
					 include('../user/choose.php');
				 }
				 if($_GET['id']==3)
				 {
					 include('../user/feedback.php');
				 }
				 if($_GET['id']==4)
				 {
					 include('../user/signout.php');
				 }
				 if($_GET['id']==5)
				 {
					 include('../user/profile.php');
				 }
				 if($_GET['id']==6)
				 {
					 include('insert_cutoff.php');
				 }
				 if($_GET['id']==7)
				 {
					 include('insert_info.php');
				 }
				 if($_GET['id']==8)
				 {
					 include('admin_retrive.php');
				 }
				 				 if($_GET['id']==9)
				 {
					 include('user_update.php');
				 }
				 
				 
			 }
	   ?>