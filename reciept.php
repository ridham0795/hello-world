<?php
	include 'assets/php/conn.php';
	include "assets/php/functions.php";

	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      DETAILS
    </title>
  
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
    
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    
	<link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/plain/plain-fonts.css">
    
     
    <link rel="stylesheet" type="text/css" href="assets/fonts/lovelo/lovelo.css">
    
	<link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/owl/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/extras/slicknav.css">

	<link rel="stylesheet" type="text/css" href="assets/css/colors/orange.css" title="orange" media="screen" />
    <link rel="stylesheet" href="css/style.css">
  
   
  </head>
  <body>
<?php 

$pid=$_GET["pid"];
$hid=$_GET["hid"];
$sql="select * from patient where pid='$pid'";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res))
{
$name=$row["name"];
$age=$row["dob"];
$gender=$row["gender"];
$address=$row["address"];
$phone=$row["phone"];
$type=$row["identitytype"];
$value=$row["identityvalue"];
$email=$row["email"];
}

$sql1="select * from hospital where id='$hid'";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_assoc($res1))
{

$nameh=$row1["name"];
$addressh=$row1["address_First_Line"];
}


$sql2="select * from appointment where pid='$pid' and hid='$hid'";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_assoc($res2))
{

$time=$row2["approvetime"];
$date=$row2["approvedate"];
$issue=$row2["issue"];
$description=$row2["discription"];
}



?>


	 	<header id="header-wrap">
		<section id="header">
          <div class="logo-menu">
			<nav class="navbar navbar-default navbar-plain" role="navigation" data-spy="affix" data-offset-top="50">
				<div class="container">

					 <div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					</button>
					<a class="navbar-brand" href="index.php">
					  <h2>DIGITALISATION</h2>
					</a>
				  </div>
				
				  <div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav animated-nav navbar-right">
					  <li><a href="index.php">HOME</a></li>                                    
					  <li><a href="search.php?">HOSPITALS</a></li>
					  <li><a href="appointment.php">MAKE AN APPOINTMENT</a></li>
					  <li><a href="emergency.php" >EMERGENCY</a></li>
					  <li><a href="faq.php" >FAQ</a></li>
					  <?php
						if(empty($_SESSION['register']))
						{?>
					  <li><a href="sign.php" >LOGIN</a></li>
					  <?php
						}
						else
						{
						?>
						<li><a href="Sign_out.php">LOGOUT</a></li> 
						<?php
						}
						?>							
					  <li><a href="contactus.php">CONTACT US</a></li> 
					                          <a href="#" class="open-search">
                      <i class="fa fa-search">
                      </i>
                    </a>
                  </li>
                  <!-- Search Ends -->
                  
                </ul>
                
                <!-- Form for navbar search area -->
                <form class="full-search" action="search.php" action="get">
                  <div class="container">
                    <input type="text" placeholder="Type to Search Hospital" name="search">
                    <a href="#" class="close-search">
                      <span class="fa fa-times fa-2x">
                      </span>
                    </a>
                  </div>
                </form>
                <!-- Search form ends -->
					</ul>       
				  </div>
				</div>

				<ul class="wpb-mobile-menu">
					<li><a href="index.php">HOME</a></li>                                    
					<li><a href="search.php?">HOSPITALS</a></li>
					<li><a href="appointment.php">MAKE AN APPOINTMENT</a></li>
					<li><a href="emergency.php" >EMERGENCY</a></li>
					<li><a href="faq.php" >FAQ</a></li>
					<?php
						if(empty($_SESSION['register']))
					{?>
					  <li><a href="sign.php" >LOGIN</a></li>
					<?php
						}
						else
						{
					?>
						<li><a href="Sign_out.php">LOGOUT</a></li> 
					<?php
						}
					?>
					<li><a href="contactus.php">CONTACT US</a></li>
				</ul>
				
			</nav>
			  
        </div>
      
      </section>    
    </header>

	<div class="col-md-8 col-md-offset-3" style=" border-width:5px;	border-style:double; ">
		<div class="respond">
            <center><h3>Reciept</h3></center>
			<div class="col-xs-6 col-sm-5">
			   <b> Name:</b>&nbsp&nbsp&nbsp<?php echo $name;?>
			</div>
			<div class="col-xs-6 col-sm-3">
				<b> Email:</b>&nbsp&nbsp&nbsp<?php echo $email;?>
			</div>
			<div class="col-xs-6 col-sm-5">
			   <b> Age:</b>&nbsp&nbsp&nbsp<?php echo $age;?>
			</div>
			<div class="col-xs-6 col-sm-5">
			   <b> Gender:</b>&nbsp&nbsp&nbsp<?php echo $gender;?>
			</div>
			<div class="col-xs-6 col-sm-5">
			   <b> Phone-Number:</b>&nbsp&nbsp&nbsp<?php echo $phone;?>
			</div>
			<div class="col-xs-12 col-sm-4">
				<b> Identity Type:</b><?php echo $type;?>
			</div>
			
			<div class="col-xs-12 col-sm-3">
				<?php echo '<b>'.$type.'</b> : '.$value;?>
			</div>
			<div class="col-md-6" >
				<b> Address:</b> <?php echo $address;?>
			</div>
			<div class="col-sm-3">
				<b>Patient ID:</b>&nbsp&nbsp&nbsp<?php echo $pid;?>
			</div>			
			<div class="col-md-12" >
				<div class="col-md-4">
				<b>Symptoms</b>:<?php echo $issue;?>
				</div>
				<div class="col-sm-4">
					<b>Time:</b>&nbsp&nbsp&nbsp<?php echo $time;?>
				</div>				
				<div class="col-sm-4">
					<b>Date:</b>&nbsp&nbsp&nbsp<?php echo $date;?>
				</div>
			</div>
			<div class="col-md-12" >
				<b> Description: </b><?php echo $description;?><br><br>
			</div>
			
			<div class="col-xs-12 col-sm-4">
				<b> Identity Type:</b><?php echo $type;?>
			</div>
		</div>
		<div class="col-md-12" >
            <center> <h3>Hospital Details</h3></center>
        </div>
		<div class="col-md-12" >
            <b>  Name:</b><?php echo $nameh;?>
        </div>
        <div class="col-md-12" >
			<b> Address: </b><?php echo $addressh;?>
		</div>
		<div class="col-md-12" >
            <center> <h3>Location</h3></center>
			<iframe
			  width="800px";
			  height="600px"
			  frameborder="0" style="border:0"
			  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyAbd318t5kTkd5tBcqCxISXCeWRSdcL-sI&origin=<?php echo $address;?>&destination=<?php echo $nameh;?>,&avoid=tolls|highways">
			</iframe>
        </div>
		<div class="col-md-12"">
			<div class="row">
				<br><a href="Sign_out.php" class="btn btn-info">logout and submit</a>
				<button class="btn btn-info" onclick="window.print();">print</button>
			</div>
		</div>
	</div>


	<footer style="backgroound-color:#333; padding:30px 110px; position:absolute; bottom:-750px; width:100%;">
		<p>DOCTOR VECTOR</p>
		<a href="contactus.php">CONTACT US</a>
	</footer>
	
    <!-- JavaScript & jQuery Plugins -->
    <!-- jQuery Load -->
    <script src="assets/js/jquery-min.js">
    </script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js">
    </script>
    <!--Text Rotator-->
    <script src="assets/js/jquery.mixitup.js">
    </script>
    <!--WOW Scroll Spy-->
    <script src="assets/js/wow.js">
    </script>
    <!-- OWL Carousel -->
    <script src="assets/js/owl.carousel.js">
    </script>
    <!-- Placeholder -->
    <script src="assets/js/placeholdem.min.js">
    </script>
    <!-- Vide -->
    <script src="assets/js/jquery.vide.js">
    </script>
    <!-- Skrollr -->
    
    <!-- Smooth Scroll -->
    <script src="assets/js/smooth-scroll.js">
    </script>
    <!-- WayPoint -->
    <script src="assets/js/waypoints.min.js">
    </script>
    <!-- CounterUp -->
    <script src="assets/js/jquery.counterup.min.js">
    </script>
    <!-- ScrollTop -->
    <script src="assets/js/scroll-top.js">
    </script>
    <!-- Appear -->
    <script src="assets/js/jquery.appear.js">
    </script>
    <!-- Slicknav -->
    <script src="assets/js/jquery.slicknav.js">
    </script>
    <!-- All JS plugin Triggers -->
    <script src="assets/js/main.js">
    </script>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbd318t5kTkd5tBcqCxISXCeWRSdcL-sI&signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>
  </body>
</html>