<?php

 if(!isset($_SESSION['login_user'])){

		header ("location:homePage.php");
  } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
			<link rel="stylesheet" href="css/menu.css" type="text/css" media="all" />
  <style>

        </style>
<script>

</script>
    </head>
    
        <body>
 <h1 align="center"><font face="Comic Sans MS"color="#008000"size="10">C</font><font color="black">ollege </font><font face="Comic Sans MS"color="#008000"size="10">A</font><font color="black">dvsior.</font> </h1>
       <ul>
           <li><a href="home.php">Home</a></li>
		   <li><a href="choose.php">Choose College</a></li>
           <li><a href="feedback.php">Feedback</a></li>
		    <li><a href="about.php">About</a></li>
		   <li><?php echo $_SESSION['login_user']; ?>
		   <ul><li><a href="profile.php">Profile</a></li>
		   <li><a href="signout.php">Signout</a></li>
</ul></li>
       </ul>