<?php 

if(!isset($_SESSION['login_user'])){
     header ("location:../homePage.php");
	
 }  $uid= $_SESSION['login_id'];
  global $uid;
 ?>
<html>

			<link rel="stylesheet" href="../css/profile.css" type="text/css" media="all" />

<body>
<head>

<?php

error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
$link = mysqli_connect('localhost','root','','college'); 
$res = mysqli_query($link,"select * from student where id='$uid'");

if(mysqli_num_rows($res)>0)
{
	//echo "You are login Successfully ";
 $row = mysqli_fetch_assoc($res);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
 	
}

/*
<div class="image">
</div> */?>
<div class="txt">
<table>
<tr>
<p>Name:<?php echo $name; ?></p></tr><tr>
<p>Email:<?php echo $email; ?></p></tr><tr>
<p>Mobile:<?php echo $mobile; ?></p></tr>
</table>
<br>
<div class="tb">
<button class="tablink" onclick="openPage('Cart', this, 'rgba(172, 172, 134, 1)')">Update Profile</button>
<button class="tablink" onclick="openPage('History', this, '#acac86')" id="defaultOpen">Wishlist</button>
</div>
</div>



<div id="Cart" class="tabcontent">

  <?php include('user.php'); ?>
</div>

<div id="History" class="tabcontent">
  
<?php include('wishlist.php');  ?>
</div>





</head>




<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     

</body>
<?php include('footer.html'); ?>
</html>
