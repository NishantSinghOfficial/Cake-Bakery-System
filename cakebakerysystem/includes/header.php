<header class="main_header_area">
            <div class="top_header_area row m0">
                <div class="container">
                    <div class="float-left">
                        <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + <?php  echo $row['MobileNumber'];?></a>
                        <a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php  echo $row['Email'];?></a>
                    </div><?php } ?>
                    <div class="float-right">
                        
                        <ul class="h_search list_style">
                            <?php
                            $userid= $_SESSION['fosuid'];
$ret1=mysqli_query($con,"select * from tblorders where IsOrderPlaced is null && UserId='$userid'");
$num=mysqli_num_rows($ret1);

?>
                            <li><a href="cart.php"><i class="lnr lnr-cart"><strong><?php echo $num;?></strong></i></a></li>

                            <li><a href="search-cake.php"><i class="fa fa-search"></i></a></li>
                            <li style="color: white;"><a href="admin/index.php">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_menu_area">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="index.php">
                        <img src="img/logo.png" alt="">
                        <img src="img/logo-2.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="my_toggle_menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="dropdown submenu active">
                                    <a class="dropdown-toggle"  href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                   
                                </li>
                                <li><a href="cake.php">Our Cakes</a></li>
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cake Category</a>
                                    <ul class="dropdown-menu">
                                        <?php
              
$ret=mysqli_query($con,"select * from tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <li><a href="category-details.php?catname=<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></a></li><?php }?>
                                       
                                    </ul>
                                </li>
                                 <li><a href="about-us.php">About Us</a></li>
                                
                            </ul>
                            <ul class="navbar-nav justify-content-end">
                               <?php if (strlen($_SESSION['fosuid']==0)) {?>
                                <li><a href="registration.php">Sign up</a></li>
                                <li><a href="login.php">Sign in</a></li>
                                <li><a href="track-order.php">Track Order</a></li><?php } ?>
                                <?php if (strlen($_SESSION['fosuid']>0)) {?>
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="change-password.php">Change Password</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                                <li><a href="cart.php">Cart Page</a></li>
                                <li><a href="my-order.php">My Orders</a></li><?php } ?>
                                
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>