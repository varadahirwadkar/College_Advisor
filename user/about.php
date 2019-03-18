<?php

 if(!isset($_SESSION['login_user'])){

		header ("location:../homePage.php");
		 exit();
  }
?>
<html>
<head>
	
	<link href="../css/about.css" rel='stylesheet' type='text/css' media="all" />

	</head>
	<body>
		<div>
	

			<div class="aboutUsContainer">
				<div class="innerImage">
						<img src="../images/quote.jpg"></img>
				</div>
				<div class="aboutContent">
					<div class="aboutUsTitle textContent">About Us</div>
					<div class="aboutUsText textContent">
						Our online college advisor is easy to use for the students.It helps you keep updated with the admission process and information about various colleges. Our website collects preferences of each student as well as their career requirements.
						<br/>
						Make your addmission process easier with our college advisor!!
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.html') ?>
	</body>
</html>