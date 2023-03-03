<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $faid=$_SESSION['fosaid'];
     $cid=$_GET['editid'];
    $fcat=$_POST['foodcategory'];
    $itemname=$_POST['itemname'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    
   $itempic=$_FILES["itemimages"]["name"];
    $query=mysqli_query($con, "update tblfood set CategoryName='$fcat',ItemName='$itemname',ItemPrice='$price',ItemDes='$description',ItemQty='$quantity' where ID='$cid'" );
    if ($query) {
   

    
    echo '<script>alert("Cake detail has been updated")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  

}
  ?>
<!DOCTYPE html>
<html>

<head>

    <title>Cake Bakery System||Edit Cake Item</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>

    <div id="wrapper">

    <?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>
        <div class="row border-bottom">
        
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Cake</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Item Name</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Update</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        
                        <div class="ibox-content">

                            
                           <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <form id="submit" action="#" class="wizard-big" method="post" name="submit">
                                <p style="font-size:16px; color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                    <fieldset>
                                         
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Item Name:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="itemname" value="<?php  echo $row['ItemName'];?>"></div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Description:</label>
                                                <div class="col-sm-10">
                                                 
                                                 <textarea type="text" class="form-control" name="description" row="8" cols="12" required="true">
                                                    <?php  echo $row['ItemDes'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10"><img src="itemimages/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>">Edit Image</a> </div>
                                            </div>

                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Qyantity:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="quantity" value="<?php  echo $row['ItemQty'];?>"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="price" value="<?php  echo $row['ItemPrice'];?>"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Weight:</label>
                                                <div class="col-sm-10">
<select name="weight" class="form-control white_bg">
    <option value=""><?php  echo $row['Weight'];?></option>
    <option value="500 gm">500 gm</option>
                                                    <option value="1 kg">1 kg</option>
                                                    <option value="1.5 kg">1.5 kg</option>
                                                    <option value="2 kg">2 kg</option>
                                                    <option value="2.5 kg">2.5 kg</option>
                                                    <option value="3 kg">3 kg</option>
                                                    <option value="3.5 kg">3.5 kg</option>
                                                    <option value="4 kg">4 kg</option>
</select>
                                                    </div>
                                            </div>
                                           <div class="form-group row"><label class="col-sm-2 col-form-label">Cake Category:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control white_bg" name='foodcategory' >
                  <option value="<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></option>
                  <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>
                  <option value="<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></option><?php } ?>
              </select>    
              
     
       
   </div>
                                            </div>
                                        </fieldset>

                                </fieldset>
                                
                             
                              <?php 
$cnt=$cnt+1;
}?> 
  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Update</button></p>
            
                                
                               
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        <?php include_once('includes/footer.php');?>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
   <?php } ?>