<?php
error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE );
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
			<link rel="stylesheet" href="../css/home.css" type="text/css" media="all" />

    </head>
    
        <body>

	   <br>
	   <div>
	   <h2>Top Engineering Colleges </h2>
	   <div class="tab">
	<table>

<tbody>
<tr>
<td>
<th><img src="../images/vjti_logo.jpg" height="180" width="250"></img><br>
Veermata Jijabai Technological Institute (VJTI)</th></td>
<td><font color="black"><p align="justify"><br><br><br><br>Veermata Jijabai Technological Institute (VJTI) is an engineering college
 located in Mumbai, Maharashtra, India, and one of the oldest engineering colleges in Asia. Founded in 1887 and formerly
 known as the Victoria Jubilee Technical Institute, it adopted its present name on January 26, 1997.VJTI is an academically
 and administratively autonomous institute, however it is affiliated to the University of Mumbai.The institute is financially
 supported by the Government of Maharashtra.</p><br><br><br><hr>
</td>
<td width="300px">

</td>

</tr>
<tr>
<td>
<th><br><img src="../images/coep_logo.jpg" height="200" width="200"></img>
<br><br>College of Engineering, Pune (COEP)<br></th></td>
<td><font color="black"><p align="justify"><br><br><br><br>College of Engineering, Pune (COEP) is an autonomous engineering institute 
affiliated to Savitribai Phule Pune University in Pune, Maharashtra, India. Established in 1854, it is one of the oldest
 engineering colleges in Asia, after College of Engineering, Guindy Chennai (1794) and IIT Roorkee (1847)...The students
 and alumni of College of Engineering, Pune are colloquially referred to as COEPians.The college's study model was referred
 to, in the early 1950s, as the "Poona Model".</p>
<br><br>
<br><hr>

</td>
</tr>
<tr>
<td>
<th><img src="../images/geca_logo.jpg" height="200" width="200"></img>
<br>Government College of Engineering, Aurangabad (GECA)</th></td>
<td><font color="black"><p align="justify"><br>Government College of Engineering, Aurangabad (GECA)
 is an Autonomous Engineering Institute in Maharashtra State of India. It is affiliated to
 the Dr. Babasaheb Ambedkar Technical University and was established in 1960. The construction of the college
 was started in 1957 and was completed in 1960. Later on, it included the extension building that presently houses
 the Electronics and Telecommunication Department, Computer Science Engineering Department & Master of Computer
 Application Department. The recently constructed ClassRoom Complex houses the classes of First Year students
 of all branches along with Information Technology Department.This one of the best college of maharashtra, it is
 among the top 10 college of maharashtra (including IITs,IIITs,NITs).It is one of the premier engineering college of
 Government of Maharashtra.</p>
 <br><br><hr>


</td>

</tr>
</tbody>
</table>
</div>


</p>
<?php include('footer.html');
?>
    </body>
</html>