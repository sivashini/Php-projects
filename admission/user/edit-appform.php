<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $uid=$_SESSION['uid'];
    $coursename=$_POST['coursename'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];    
    $gender=$_POST['gender'];
    $residential=$_POST['residential'];
    $application=$_POST['application'];
    $reservation=$_POST['reservation'];
    $special=$_POST['special'];
    $coradd=$_POST['coradd'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];  
    $peradd=$_POST['peradd'];
    $percity=$_POST['percity'];
    $perstate=$_POST['perstate'];
    $perzipcode=$_POST['perzipcode'];
    $ug=$_POST['ug'];
    $grauni=$_POST['grauni'];
    $grayop=$_POST['grayop'];
    $graper=$_POST['graper'];
    $grastream=$_POST['grastream'];
    $graclass=$_POST['graclass'];
    $pg=$_POST['pg'];
    $pguni=$_POST['pguni'];
    $pgyop=$_POST['pgyop'];
    $pgper=$_POST['pgper'];
    $pgstream=$_POST['pgstream'];
    $pggraclass=$_POST['pggraclass'];
    $experience=$_POST['experience'];
    $institution=$_POST['institution'];
    $designation=$_POST['designation'];
    $service=$_POST['service']; 
    $institutionone=$_POST['institutionone'];
    $designationone=$_POST['designationone'];
    $serviceone=$_POST['serviceone'];
    $institutiontwo=$_POST['institutiontwo'];
    $designationtwo=$_POST['designationtwo'];
    $servicetwo=$_POST['servicetwo'];
    $sign=$_FILES['$sign'];
    $upic=$_FILES['$upic'];       

     
    

    $query=mysqli_query($con,"update tbladmapplications set coursename='$coursename',fname='$fname',lname='$lname',dob='$dob',gender='$gender',residential='$residential',application='$application',reservation='$reservation',special='$special',coradd='$coradd',city='$city',state='$state',zipcode='$zipcode',peradd='$peradd',percity='$percity',perstate='$perstate',perzipcode='$perzipcode',ug='$ug',grauni='$grauni',grayop='$grayop',graper='$graper',grastream='$grastream',pg='$pg',pguni='$pguni',pgyop='$pgyop',pgper='$pgper',pgstream='$pgstream',sign='$sign',upic='$upic' where ID='$eid' && uid='$uid'");
    
    if ($query) {
    
    echo '<script>alert("Data has been updated successfully.")</script>';
   
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}

  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title> Admission || admission Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Admission Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">


<form name="submit" method="post" enctype="multipart/form-data">    <?php
$eid=$_GET['editid'];
$uid=$_SESSION['uid'];
$ret=mysqli_query($con,"select * from tbladmapplications where ID='$eid' && uid='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>       
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Update Addimission Form</h4>

                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
 

                  <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Specialized                   </h5>
   <div class="form-group">
   <select class="form-control white_bg" id="coursename" name="coursename"  required>
    <option value="<?php echo $row['coursename'];?>"><?php echo $row['coursename'];?></option>
    <option value="">--</option>
<option value="CE">CE</option>
<option value="CHE">CHE</option>
<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EIE">EIE</option>
<option value="EEE">EEE</option>
<option value="IT">IT</option>
<option value="ME">ME</option>
<option value="CS">CS</option>
<option value="MA">MA</option>
<option value="PHY">PHY</option>
   </select>
    </div>
</fieldset>
                   
</div>

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Pic                   </h5>
   <div class="form-group">
     <img src="userimages/<?php  echo $row['upic'];?>" width="150" height="200"> <a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
      
    </div>
</fieldset>                  
</div>
 </div>               
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>First Name                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="fname" name="fname"  type="text" required='true' value="<?php echo $row['fname'];?>">
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Last Name                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="lname" name="lname"  type="text" required='true' value="<?php echo $row['lname'];?>">
                          </div>
                        </fieldset>
                      </div>
                    </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="text" required='true' value="<?php echo $row['dob'];?>">
          <small class="text-muted">DOB Must be in this format (YYYY-MM-DD)</small>
    </div>

</fieldset>                  
</div>

<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Gender                </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="gender" name="gender"  required>
    <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
   </select>
                          </div>
                        </fieldset>
                      </div>

                    </div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <h5>Residential Category : : </h5>
   
<select class="form-control white_bg" id="residential" name="residential"  required>
    <option value="<?php echo $row['residential'];?>"><?php echo $row['residential'];?></option>
<option value="">Select Category</option>
<option value="py">U.T. of Puducherry</option>
<option value="os">Other State</option>
<option value="fn">FN</option>
   </select>
  </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <h5>Application : </h5>
   
<select class="form-control white_bg" id="application" name="application"  required>
    <option value="<?php echo $row['application'];?>"><?php echo $row['application'];?></option>
<option value="">Select</option>
<option value="ft">Full Time</option>
<option value="pti">Part Time (Internal)</option>
<option value="pte">Part Time (External)</option>
   </select>
  </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <h5>Reservation Category : </h5>
   
<select class="form-control white_bg" id="reservation" name="reservation"  required>
    <option value="<?php echo $row['reservation'];?>"><?php echo $row['reservation'];?></option>
    <option value="general">General</option>
<option value="obc">OBC</option>
<option value="mbc">MBC</option>
<option value="ebc">EBC</option>
<option value="bcm">BCM</option>
<option value="bt">BT</option>
<option value="sc">SC</option>
<option value="st">ST</option>
   </select>
  </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <h5>Special Reservation : </h5>
   
<select class="form-control white_bg" id="special" name="special"  required>
    <option value="<?php echo $row['special'];?>"><?php echo $row['special'];?></option>
    <option value="">Select</option>
    <option value="General">General</option>
    <option value="pwd">Person with Disabilities (PwD)</option>
<option value="sp">Sports Merit (SP)</option>
<option value="esm">Wards of Ex-Service Men (ESM)</option>
<option value="ff">Children / Grand Children of Freedom Fighter (FF)</option>
   </select>
  </div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Correspondence Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="coradd" name="coradd"  type="text" value="<?php echo $row['coradd'];?>">
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="city" name="city"  type="text" value="<?php echo $row['city'];?>">
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="state" name="state"  type="text"  value="<?php echo $row['state'];?>">
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="zipcode" name="zipcode"  type="text"  value="<?php echo $row['zipcode'];?>">
    </div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Permanent Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="peradd" name="peradd"  type="text"  value="<?php echo $row['peradd'];?>">
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="percity" name="percity"  type="text"  value="<?php echo $row['percity'];?>">
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="perstate" name="perstate"  type="text"  value="<?php echo $row['perstate'];?>">
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="perzipcode" name="perzipcode"  type="text"  value="<?php echo $row['perzipcode'];?>">
    </div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top: 2%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title">Education Qualification</h4>
<hr />
  </div>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12">
<table class="table mb-0">
<tr>
  <th>Degree(UG/PG)</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
       <th>Stream</th>
       <th>Class</th>
</tr>
<th>
   <select class="form-control white_bg" id="ug" name="ug"  required>
   <option value="<?php echo $row['ug'];?>"><?php echo $row['ug'];?></option>

    <option value="">Select UG</option>
<option value="be">B.E</option>
<option value="btech">B.Tech</option>
<option value="bsc">B.Sc</option>
<option value="other">Other</option>


   </select></th>

<td>   <input class="form-control white_bg" id="grauni" name="grauni"  value="<?php echo $row['grauni'];?>" type="text"></td>
<td>   <input class="form-control white_bg" id="grayop" name="grayop"   value="<?php echo $row['grayop'];?>"type="text"></td>
<td>   <input class="form-control white_bg" id="graper" name="graper"  value="<?php echo $row['graper'];?>" type="text"></td>
<td>   <input class="form-control white_bg" id="grastream" name="grastream"  value="<?php echo $row['grastream'];?>" type="text" ></td>
<td>   <select class="form-control white_bg" id="graclass" name="graclass"  value="<?php echo $row['graclass'];?>" >
<option value="<?php echo $row['graclass'];?>"><?php echo $row['graclass'];?></option>
    <option value="">Select Class</option>
<option value="fcd">First Class with Distinction</option>
<option value="fc">First Class</option>
<option value="scc">Second Class </option>



   </select></td>
</tr>
<tr>
<th><select class="form-control white_bg" id="pg" name="pg"  required>
<option value="<?php echo $row['pg'];?>"><?php echo $row['pg'];?></option>
    <option value="">Select PG</option>
<option value="me">M.E</option>
<option value="mtech">M.Tech</option>
<option value="mbc">M.Sc</option>
<option value="mca">M.C.A</option>
<option value="others">Other</option>
</th>
<td>   <input class="form-control white_bg" id="pguni" name="pguni" value="<?php echo $row['pguni'];?>"  type="text" ></td>
<td>   <input class="form-control white_bg" id="pgyop" name="pgyop" value="<?php echo $row['pgyop'];?>"  type="text"></td>
<td>   <input class="form-control white_bg" id="pgper" name="pgper" value="<?php echo $row['pgper'];?>"  type="text" ></td>
<td>   <input class="form-control white_bg" id="pgstream" name="pgstream" value="<?php echo $row['pgstream'];?>"  type="text" ></td>
<td>    <select class="form-control white_bg" id="pggraclass" name="pggraclass"  value="<?php echo $row['pggraclass'];?>">
<option value="<?php echo $row['pggraclass'];?>"><?php echo $row['pggraclass'];?></option>    
<option value="">Select Class</option>
<option value="fcd">First Class with Distinction</option>
<option value="fc">First Class</option>
<option value="scc">Second Class </option>



   </select></td>
</tr>
</table>
</div>
</div>
</hr>
<div class="row" style="margin-top: 2%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title">Professional Experience</h4>
  <div class="col-xl-12 col-lg-12">
 <fieldset>
  <h5>Total Number of Years  & Months as on 30.11.2021                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="experience" name="experience"  type="text" value="<?php echo $row['experience'];?>">
    
    </div>
</fieldset>                  
</div>
<hr />
  </div>
</div>
<div class="row">
  &nbsp;&nbsp;&nbsp;<h5>Chronological order of employment </h5>
<div class="col-xl-12 col-lg-12">
<table class="table mb-0">
<tr>
  <th>Institution/Organization name</th>
   <th>Designation</th>
    
     <th>Service Period</th>
       
</tr>
<td>   <input class="form-control white_bg" id="institution" name="institution" placeholder="Institution/Organization name"  type="text" value="<?php echo $row['institution'];?>"></td>
<td>   <input class="form-control white_bg" id="designation" name="designation" placeholder="Designation"  type="text" value="<?php echo $row['designation'];?>"></td>
<td>   <input class="form-control white_bg" id="service" name="service" placeholder="Service Period"  type="text" value="<?php echo $row['service'];?>"></td>

</tr>
</tr>
<td>   <input class="form-control white_bg" id="institutionone" name="institutionone" placeholder="Institution/Organization name"  type="text" value="<?php echo $row['institutionone'];?>"></td>
<td>   <input class="form-control white_bg" id="designationone" name="designationone" placeholder="Designation"  type="text" value="<?php echo $row['designationone'];?>"></td>
<td>   <input class="form-control white_bg" id="serviceone" name="serviceone" placeholder="Service Period"  type="text" value="<?php echo $row['serviceone'];?>"></td>

</tr>
</tr>
<td>   <input class="form-control white_bg" id="institutiontwo" name="institutiontwo" placeholder="Institution/Organization name"  type="text" value="<?php echo $row['institutiontwo'];?>"></td>
<td>   <input class="form-control white_bg" id="designationtwo" name="designationtwotwo" placeholder="Designation"  type="text" value="<?php echo $row['designationtwo'];?>"></td>
<td>   <input class="form-control white_bg" id="servicetwo" name="servicetwo" placeholder="Service Period"  type="text" value="<?php echo $row['servicetwo'];?>"></td>

</tr>

</table>
</div>
</div>
</hr>
<div class="row" style="margin-top: 2%">
  
<div class="col-xl-12 col-lg-12"><h4 class="card-title"><b>Declartion</b></h4> <hr />
</div>
</div>
 <div class="row">
<div class="col-xl-12 col-lg-12">
<h5><b>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.</b></h5>
 </div>
 </div>               
<div class="row"> 
<div class="col-xl-6 col-lg-12">
<fieldset>
<div class="form-group">
     <img src="usersign/<?php  echo $row['sign'];?>" width="100" height="100"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
    </div>
 </fieldset>  
</div>
</div><?php 
$cnt=$cnt+1;
}?>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button>
</div>
</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
     
        <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
</body>
</html>
<?php  } ?>
