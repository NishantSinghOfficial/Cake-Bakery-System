<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
$foodid=$_POST['foodid'];
$userid= $_SESSION['fosuid'];
$query=mysqli_query($con,"insert into tblorders(UserId,FoodId) values('$userid','$foodid') ");
if($query)
{
 echo "<script>alert('Cake has been added in to the cart');</script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}


  ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Cake Bakery System || Search Cake</title>

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
        			<h3>Search Cake</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="search-cake.php">Search Cake</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Search Cakes</h2>
                    <form method="post">
     <div class="form-group col-md-12" style="padding-top: 20px;">
                <input type="text" class="form-control" id="searchkey" name="searchkey" placeholder="Search Cake by name" required="true">
              </div>
              
                            <div class="form-group col-md-12">
                                <button type="submit" value="Search" name="search" class="btn order_s_btn form-control">search</button>
                            </div>
                            </form>
        		</div>

<?php if(isset($_POST['search'])){
    $searchkey=$_POST['searchkey'];
    ?>
    <h3 align="center">Search Result againt keyword "<?php echo $searchkey; ?>"</h3>
    <hr />
<div class="cake_feature_row row">				
<?php

$ret=mysqli_query($con,"select * from tblfood  where ItemName like '%$searchkey%'");
$num=mysqli_num_rows($ret);
if($num>0){
while ($row=mysqli_fetch_array($ret)) {

?>

					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="admin/itemimages/<?php echo $row['Image'];?>" width="400" height="180">
							</div>
							<div class="cake_text">
								<h4>$<?php echo $row['ItemPrice'];?></h4>
								<h3><a href="cake-detail.php?fid=<?php echo $row['ID'];?>"><?php echo $row['ItemName'];?></a></h3>
								<?php if($_SESSION['fosuid']==""){?>
       								<a href="login.php" class="pest_btn">Add to Cart</a>
<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="pest_btn">Add to Cart</button>
  </form> 
<?php }?>
							</div>
						</div>
					</div><?php } } else {?>
<div class="col-lg-12 col-md-4 col-6" align="center" style="font-size:26px; color:red;">
    No Record Found
</div>
                    <?php } ?>
				</div>
            <?php } ?>
          
        	</div>
        </section>
        <!--================End Blog Main Area =================-->
        
      
        
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
        
        <script src="js/theme.js"></script>
    </body>

</html>