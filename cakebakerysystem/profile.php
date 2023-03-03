<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $sid=$_SESSION['fosuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    
   

    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$sid'");


    if ($query) {
    $msg="Your profile has been updated";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

}

 ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Cake Bakery System|| Profile</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<?php include_once('includes/header.php');?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Profile</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="profile.php">User Profile</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>User Profile</h2>
					<h5>Update your profile!!!.</h5>
				</div>
       			<div class="row">
       				<div class="col-lg-7">  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
       					<form class="row contact_us_form" action="" method="post">
                
  <?php
$pid=$_SESSION['fosuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  
							<div class="form-group col-md-12">
                <label style="color: royalblue;">First Name</label>
								<input type="text" class="form-control" id="firstname" name="firstname" value="<?php  echo $row['FirstName'];?>" required="true">
							</div>
              <label style="color: royalblue;">Last Name</label>
							<div class="form-group col-md-12">
								<input type="text" class="form-control" id="lastname" name="lastname" value="<?php  echo $row['LastName'];?>" required="true">
							</div>
							 <label style="color: royalblue;">Email address</label>
							<div class="form-group col-md-12">
								<input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
							</div>
              <label style="color: royalblue;">Mobile Number</label>
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  readonly="true">
              </div>
              <label style="color: royalblue;">Registraton Date</label>
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="regdate" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true">
              </div>
            <?php } ?>
							<div class="form-group col-md-12">
								<button type="submit" value="submit" name="submit" class="btn order_s_btn form-control">submit now</button>
							</div>
						</form>
       				</div>
       				<div class="col-lg-4 offset-md-1">
       					<div class="contact_details">
       						<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
       						<div class="contact_d_item">
       							<h3>Address :</h3>
       							<p><?php  echo $row['PageDescription'];?></p>
       						</div>
       						<div class="contact_d_item">
       							<h5>Phone : <?php  echo $row['MobileNumber'];?></h5>
       							<h5>Email : <?php  echo $row['Email'];?></h5>
       						</div>
       						
       					</div>
       				</div><?php } ?>
       			</div>
        	</div>
        </section>
        <!--================End Contact Form Area =================-->
        
        
       
       <?php include_once('includes/footer.php');?>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/map-active.js"></script>
        
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html><?php  } ?>