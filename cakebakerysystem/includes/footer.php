<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!--================Newsletter Area =================-->
        <section class="newsletter_area">
            <div class="container">
                <div class="row newsletter_inner">
                    <div class="col-lg-6">
                        <div class="news_left_text">
                            <h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter_form">
                            <form method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email address" name="email">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" value="submit" name="sub">Subscribe Now</button>
                                </div>
                            </div></form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Newsletter Area =================-->
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="footer_widgets">
                <div class="container">
                    <div class="row footer_wd_inner">
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_about_widget">
                                <img src="img/footer-logo.png" alt="">
<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
                                <ul class="nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_link_widget">
                                <div class="f_title">
                                    <h3>Quick links</h3>
                                </div>
                                <ul class="list_style">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="cake.php">Our Cakes</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <?php if (strlen($_SESSION['fosuid']==0)) {?>
                                <li><a href="registration.php">Sign up</a></li>
                                <li><a href="login.php">Sign in</a></li>
                                <li><a href="cart.html">Track Order</a></li><?php } ?>
                                <?php if (strlen($_SESSION['fosuid']>0)) {?>
                                <li><a href="registration.php">Cart Page</a></li>
                                <li><a href="login.php">My Orders</a></li>
                                <?php } ?>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_link_widget">
                                <div class="f_title">
                                    <h3>Work Times</h3>
                                </div>
                                <ul class="list_style">
                                    <li><a href="#">Mon. :  Fri.: 8 am - 8 pm</a></li>
                                    <li><a href="#">Sat. : 9am - 4pm</a></li>
                                    <li><a href="#">Sun. : Closed</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-6">
                            <aside class="f_widget f_contact_widget">
                                <div class="f_title">
                                    <h3>Contact Info</h3>
                                </div>
                                <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <h4>Phone : <?php  echo $row['MobileNumber'];?></h4>
                                <p>Address : <br /><?php  echo $row['PageDescription'];?></p>
                                <h5>Email : <?php  echo $row['Email'];?>n</h5><?php } ?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_copyright">
                <div class="container">
                    <div class="copyright_inner">
                        <div class="float-left">
                            <h5><a target="_blank" href="index.php">Cake Bakery System</a></h5>
                        </div>
                        <div class="float-right">
                            <a href="index.php">Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
    