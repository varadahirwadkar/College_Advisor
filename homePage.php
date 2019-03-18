<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
session_start();
 if(isset($_SESSION['login_user'])){

		header ("location:user/home.php");
  }
  include('login1.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
		<title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="css/menu.css" type="text/css" media="all">
		

        <style>
			*{
				box-sizing: border-box;
			}
			body{
				font-family: Arial, Helvetica, sans-serif;
			}
			.bannerClass{
				width:60%;
				height:430px;
				display:inline-block;
			}
			.bannerClass img{
				width:100%;
				height:100%;
			}
			.infoClass{
				display:inline-block;
				width:37%;
				margin-left: 20px;
				height: 430px;
			}
			.infoClass table:not(:first-child){
				margin-top:20px;
			}
			.logo{
				float:left;
			}
			.options{
				float:right;
				padding:10px;
			}
			.header:after{
				clear:both;
				display:block;
				content:"";
			}
			.signUp{
				margin: 15px 0 0 350px;
				font-size: 13px;
			}
			.options .signUp span{
				color:blue;
				margin:0;
				text-decoration:underline;
				cursor:pointer;
			}
			.options input{
				border-radius:5px;
				height:25px;
				width:130px;
			}
			.options span{
				margin-left:10px;
			}
			.options button{
				width: 70px;
				font-size: 14px;
				line-height: 13px;
				margin-left: 15px;
				background-color: #008000;
				padding: 5px;
				border-radius: 4px;
			}
			button{
				color: #fff;
			}
			.right{
				width:80% :
				right:0;
				margin-top:3px;
				margin-left: 20%;
				text-decoration: none;
				style: white;
				color: #fff;
			}
			.form-popup{
				//overflow-y:auto;
				display: none;
				position: fixed;
				z-index: 1;
				padding-top: 80px;
				left: 0;
				top: 0;
				width: 100%; 
				height: 100%; 
				background-color: rgba(0,0,0,0.7);		
			}
			.form-container{
				overflow-y:auto;
				margin:0 auto;
				width:40%;
				height:500px;
				padding: 10px 20px;
				background-color: white;
				position:relative;
			}
			.form-container h1{
				color:black;
				margin:10px;
			}
			.close-icon{
				position: absolute;
				right: 20px;
				top: 34px;
				cursor: pointer;
			}
			.close-icon img{
				width:30px;
			}
			.form-container .btn {
				background-color: #4CAF50;
				color: white;
				padding: 10px;
				border: none;
				cursor: pointer;
				width: 100%;
				margin-bottom:10px;
				opacity: 0.8;
			}	
			
			/*::-webkit-scrollbar {
				width: 10px;
			}
			::-webkit-scrollbar-track {
				background: #fff; 
			}
			::-webkit-scrollbar-thumb {
				background: #888; 
			}
			::-webkit-scrollbar-thumb:hover {
				background: #555; 
			}*/
			.form-container .btn:hover {
				opacity: 1;
			}	
			.footer {
				clear: both;
				position: relative;
				z-index: 10;
				height: 4em;
				margin-top: 12em;
			}
			th{
				background-color:grey;
			}
			.main{
				padding-top:25px;
				border-top:2px solid black;
					
			}
			input[type="submit"]{
				background: #ff3366;
				color: #000;
				font-size: 15px;
				padding: 0.3em 0.2em;
				width: 30%;
				font-weight: 500;
				transition: 0.5s all;
			  
				display: inline-block;
				cursor: pointer;
				outline: none;
				border: none;
				border-radius: 3px;
				font-family: 'Roboto Condensed', sans-serif;
			}
			input[type="submit"]:hover {
				background: #b5183f;
				transition: 0.5s all;
			}	
             .footer{
				height: 7em; 
				z-index:-1;
			 }
			/* Full-width input fields */
			.form-container input[type=text], .form-container input[type=password] {
			  width: 100%;
			  padding: 15px;
			  margin: 5px 0 22px 0;
			  border: none;
			  background: #f1f1f1;
			}

			/* When the inputs get focus, do something */
			.form-container input[type=text]:focus, .form-container input[type=password]:focus {
			  background-color: #ddd;
			  outline: none;
			}
        </style>
		<script language="Javascript">
			MyBanners=new Array('images/l.jpg','images/m.jpg','images/j.jpg')
			banner=0
			function ShowBanners(){ 
				if (document.images){ 
					banner++
					if (banner==MyBanners.length) {
						banner=0
					}
					document.ChangeBanner.src=MyBanners[banner]
					setTimeout("ShowBanners()",5000)
				}
			}
			
			function openForm() {
				document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
				document.getElementById("myForm").style.display = "none";
			}
		</script>
		<script type="text/javascript">

			function validation()
{
var a = document.sign.firstname.value;
if(a=="")
{
alert("Please Enter Your Name");
document.sign.firstname.focus();
return false;
}
}
function validationEmail()
{
var emailID = document.sign.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct email ID")
            document.sign.mail.focus() ;
            return false;
         } 
}

function validationMobile()
{
var val =document.sign.mobile.value;
           var a=/^\d{10}$/;
		if (a.test(val)) 
                   {
     
		   } 
                 else {
                        alert("Invalid number; must be ten digits");
                               document.sign.mobile.focus();
                                return false;
                        }
         return( true );
		 }


function validationconfirm()
{
 var pass1=document.sign.password.value;
 
 var pass2=document.sign.confirmpass.value;
 
 
	 if(pass1 != pass2)
	   {
	    alert("Password does not match")
            document.sign.confirmpass.focus() ;
            return false;
	   }
}

function CheckPassword() 
{ 
var pas=document.sign.password.value;
var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
if(paswd.test(pas)) 
{ 
return true;
}
else
{ 
alert('Wrong.Password should be greaterthan 7 char and 1 d and 1 spc!')
document.sign.password.focus() ;
return false;
}

} 
		 
		 
			
		</script>
	</head>
<body onload="ShowBanners()">
	<div class="header">
		<div class="logo">
			<img src="images\ca.png" id="abc">
		</div>
		<form action="login1.php" method="post">
		<div class="options">
			<span>Username :</span>
			<input type="text" name="username" placeholder="Username">
			<span>Password :</span>
			<input type="password" name="password" placeholder="Password">
			<button type="submit" value="submit" name="login">Login</button>
		OR	Login as <a href="collegeLogin.php">CollegeAdmin</a>
			<p class="signUp">Don't have an account? <span onclick="openForm()"> Sign Up </span>OR	SignUp as <a href="collegeAdmin/signup.php">CollegeAdmin</a>
		</p>
		</div>
		</form>
	</div>
	<div class="main">
		<div class="bannerClass">
			<img src="images/l.jpg" name="ChangeBanner">
		</div>    
		<div class="infoClass">
		<table width="100%" align="left" border="1" bordercolor="white" cellpadding="20">
			<tbody><tr><th><font size="5" color="white">College Admission council.</font></th>
			</tr><tr>
			<td><font size="4" color="black">We help high school students discover their passions, create their story, and get admitted to their preferred colleges. On an average,the students who collaborate with the College Advisor are three times as likely to be admitted at competitive schools</font>
			</td>
			</tr>
		</tbody></table>
		
		<table width="100%" align="left" border="1" bordercolor="white" cellpadding="20">
		<tbody><tr><th><font size="5" color="white">Benifits of using College Advisor.</font></th>
		</tr><tr><td><font size="4" color="black">1.Know where you stand.<br>2.Discover colleges around you.<br>3.Know the college rankings.<br> </font>
			</td></tr>
		</tbody></table>
		
		<table width="100%" align="left" border="1" bordercolor="white" cellpadding="20">
			<tbody><tr><th><font size="5" color="white">Till date...</font></th>
			</tr><tr><td><font size="4" color="black">Over 5000 users.<br>Many colleges registered across the university.<br>Over 10k searches.</font></td></tr>
		</tbody></table>
		</div>
		<div class="form-popup" id="myForm" style="display: none;" >
			<div class="form-container">
				<form action="login1.php" method="post" name="sign" onsubmit="return (validation() & validationEmail() & validationMobile() & CheckPassword() & validationconfirm() )">
					<h1>Sign Up</h1>
					<div onclick="closeForm()" class="close-icon">
						<img src="images\close.png">
					</div>
					<label for="name"><b>Name</b></label>
					<input type="text" placeholder="Enter Name" name="name" id="firstname" required>
					
					<label for="email"><b>Email</b></label>
					<input type="text" placeholder="Enter Email" name="email" id="email"required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					
					<label for="text"><b>Mobile No</b></label>
					<input type="text" placeholder="Enter Mobile" name="mobile" id="mobile"required  pattern="[0-9]{10}">
					
					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" id="password"required pattern="^(?=(.*\d){2})(?=.*[a-zA-Z])(?=.*[!@#$%])[0-9a-zA-Z!@#$%]{8,}">

					<label for="psw"><b>Confirm Password</b></label>
					<input type="password" placeholder="Confirm Password" name="psw1" id="confirmpass"required pattern="^(?=(.*\d){2})(?=.*[a-zA-Z])(?=.*[!@#$%])[0-9a-zA-Z!@#$%]{8,}">

					<button type="submit" name="signup" class="btn">Sign Up</button>
				</form>
			</div>	  
		</div>
		
    
</div>
</body>
<div class="footer">
			<?php include('user/footer.html');?>
		</div>
</html>