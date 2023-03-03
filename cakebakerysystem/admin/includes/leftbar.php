    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="img/user.png"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php
$admid=$_SESSION['fosaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$admid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                        
                            <span class="text-muted text-xs block"><?php echo $name; ?> <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="adminprofile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="changepassword.php">Change Password</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                    CBS
                    </div>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                                    </li>
                                    <li>
                    <a href="user-detail.php"><i class="fa fa-users"></i> <span class="nav-label">Reg Users</span> <span class="fa arrow"></span></a>
                                    </li>
              
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Cake Category</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="add-cakecategory.php">Cake Category</a></li>
                        <li><a href="manage-cakecategory.php">Manage Cake Category</a></li>
                    
                       
                    </ul>
                </li>
 <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Cake Menu</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="add-cake.php">Add Cake</a></li>
                        <li><a href="manage-cake.php">Manage Cake</a></li>
                    </ul>
                </li> 

        <li>
                    <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                         <li><a href="notconfirmedyet.php">Not Confirmed Yet</a></li>
                        <li><a href="confirmed-order.php">Order Confirmed</a></li>
                        <li><a href="cakebeingprepared.php">Cake Being Prepared</a></li>
                        <li><a href="cake-pickup.php">Cake Pickup</a></li>
                        <li><a href="cake-delivered.php">Cake Delivered</a></li>
                        <li><a href="canclled-order.php">Cancelled</a></li>
                         <li><a href="all-order.php">All Orders</a></li>
                    
                       
                    </ul>
                </li>


    <li>
                    <a href="subcriber.php"><i class="fa fa-users"></i> <span class="nav-label">Subscriber</span> <span class="fa arrow"></span></a>
                                    </li>
               

                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Pages</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    
                       
                    </ul>
                </li>
        
                <li>
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Enquiry</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                         <li><a href="readenq.php">Read Enquiry</a></li>
                        <li><a href="unreadenq.php">Unread Enquiry</a></li>
                        
                       
                    </ul>
                </li>
                   <li>
                    <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                         <li><a href="bwdates-report-ds.php">B/w Dates</a></li>
                        <li><a href="requestcount-report-ds.php">Order Count</a></li>
                        <li><a href="sales-reports.php">Sales Reports</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="search.php"><i class="fa fa-th-large"></i> <span class="nav-label">Search</span> <span class="fa arrow"></span></a>
                                    </li>
                                    <li>
               
            </ul>

        </div>
    </nav>