<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
 // Coding for form Submission 	
if(isset($_POST['submit']))
  {
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
    $sign=$_FILES['sign'];
    $upic=$_FILES["upic"]["name"];    
$extension = substr($upic,strlen($upic)-4,strlen($upic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
// rename user pic
$userpic=$upic.$uid.$extension;
$sign=$sign.$uid.$extension;
     move_uploaded_file($_FILES["upic"]["tmp_name"],"userimages/".$userpic);
     move_uploaded_file($_FILES["sign"]["tmp_name"],"usersign/".$sign);
    $query=mysqli_query($con,"insert into tbladmapplications(uid,coursename,fname,lname,dob,gender,residential,application,reservation,special,coradd,city,state,zipcode,peradd,percity,perstate,perzipcode,ug,grauni,grayop,graper,grastream,graclass,pg,pguni,pgyop,pgper,pgstream,pggraclass,experience,institution,designation,service,institutionone,designationone,serviceone,institutiontwo,designationtwo,servicetwo,sign,upic) value('$uid','$coursename','$fname','$lname','$dob','$gender','$residential','$application','$reservation','$special','$coradd','$city','$state','$zipcode','$peradd','$percity','$perstate','$perzipcode','$ug','$grauni','$grayop','$graper','$grastream','$graclass','$pg','$pguni','$pgyop','$pgper','$pgstream','$pggraclass','$experience','$institution','$designation','$service','$institutionone','$designationone','$serviceone','$institutiontwo','$designationtwo','$servicetwo','$sign','$userpic')");
    if ($query) {    
    echo '<script>alert("Data has been added successfully.")</script>';
    echo "<script>window.location.href ='upload-doc.php'</script>";
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again.")</script>';
         echo "<script>window.location.href ='admission-form.php'</script>";
    }
}
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title> Admission || Admission Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
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
   <?php include_once('includes/header.php');?>
 <?php include_once('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
	  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
          <table>

<th>Admission Application Form</th>
<td></td><td></td><td></td><td></td><td></td>
<td><a href="../user/download.php"><button style="width:300px" class="btn  btn-info"  type="button">&nbsp;Download</button></a></td>   
</tr>
</table>
            
          </h3>          
        </div>
   
      </div>
      <div class="content-body">
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbladmapplications where  uid=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>

<table class="table mb-0">

  <th>Application ID</th>
  <td><?php echo $row['coursename'];?><?php echo $row['ID'];?></td>
  <td></td>   
</tr>
<tr>
  <th>Specialization For </th>
  <td>Ph.D In &nbsp; <?php echo $row['coursename'];?></td>
  <td><img src="userimages/<?php echo $row['upic'];?>" width="200" height="150"></td>
</tr>

<tr>
  <th>First Name</th>
  <td><?php echo $row['fname'];?></td>
</tr>
<tr>
  <th>Last Name</th>
  <td><?php echo $row['lname'];?></td>
</tr>
<tr>
  <th>DOB</th>
  <td><?php echo $row['dob'];?></td>
</tr>

<tr>
  <th>Gender</th>
  <td><?php echo $row['gender'];?></td>
</tr>
<tr>
  <th>Residential Category</th>
  <td><?php echo $row['residential'];?></td>
</tr>
<tr>
  <th>Application Category</th>
  <td><?php echo $row['application'];?></td>
</tr>
<tr>
  <th>Reservation Category</th>
  <td><?php echo $row['reservation'];?></td>
</tr>
<tr>
  <th>Special Reservation </th>
  <td><?php echo $row['special'];?></td>
</tr>
<tr>
  <th>Permanent Address</th>
  <td><?php echo $row['peradd'];?>,<?php echo $row['percity'];?>,<?php echo $row['perstate'];?>,<?php echo $row['perzipcode'];?></td></tr>
<tr>
  <th>Address for Correspondence</th>
  <td><?php echo $row['coradd'];?>,<?php echo $row['city'];?>,<?php echo $row['state'];?>,<?php echo $row['zipcode'];?></td>
</tr>

</table>
<table class="table mb-0">
<tr>
<th>Graduation</th>
   <th>University</th>
    <th>Year</th>
     <th>Percentage</th>
       <th>Stream</th>
       <th>Class</th>
</tr>

<tr>  
  <td><?php echo $row['ug'];?></td>
  <td><?php echo $row['grauni'];?></td>
  <td><?php echo $row['grayop'];?></td>
  <td><?php echo $row['graper'];?></td>
  <td><?php echo $row['grastream'];?></td>
  <td><?php echo $row['graclass'];?></td>
</tr>
<tr>  
  <td><?php echo $row['pg'];?></td>
  <td><?php echo $row['pguni'];?></td>
  <td><?php echo $row['pgyop'];?></td>
  <td><?php echo $row['pgper'];?></td>
  <td><?php echo $row['pgstream'];?></td>
  <td><?php echo $row['pggraclass'];?></td>

</tr>
</table>
<table class="table mb-0">

<tr>
<th>Total Number of Years  & Months as on 30.11.2021</th>
<td><?php echo $row['experience'];?></td>
</tr>
</table>
<table class="table mb-0">
<tr>
<th>Institution</th>
<th>Designation</th>
<th>Service Period</th>
</tr>
<tr>
<td><?php echo $row['institution'];?></td>
<td><?php echo $row['designation'];?></td>
<td><?php echo $row['service'];?></td>
</tr>
<tr>
<td><?php echo $row['institutionone'];?></td>
<td><?php echo $row['designationone'];?></td>
<td><?php echo $row['serviceone'];?></td>
</tr>
<tr>
<td><?php echo $row['institutiontwo'];?></td>
<td><?php echo $row['designationtwo'];?></td>
<td><?php echo $row['servicetwo'];?></td>
</tr>
</table><br>


</div>
<div class="content-body">
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbldocument where  uid=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
<h3 class="content-header-title mb-0 d-inline-block">
           Attached Documents<br>
          </h3> <br>
<table class="table mb-0">
<tr>
  <th>Proof of Date of Birth (Birth Certificate/SSLC/HSC)</th>
  <td><a href="userdocs/<?php echo $row['dateofbirthdoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Residence Certificate issued by Tahsildar not older than June, 2021</th>
  <td><a href="userdocs/<?php echo $row['residencedoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Nationality Certificate (Aadhaar/Driving License/Passport/EPIC)</th>
  <td><a href="userdocs/<?php echo $row['nationalitydoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Community Certificate (if applicable)</th>
  <td><a href="userdocs/<?php echo $row['communitydoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Certificates for Special Reservation (if applicable)</th>
  <td><a href="userdocs/<?php echo $row['specialdoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Experience Certificate's</th>
  <td><a href="userdocs/<?php echo $row['experiencedoc'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Graduation Certificate</th>
  <td><a href="userdocs/<?php echo $row['gramarksheet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Post Graduation Certificate</th>
  <td><a href="userdocs/<?php echo $row['pgmarksheet'];?>" target="_blank">View File </a></td>
</tr>
</table><br>
</div>
<?php }} ?>
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tblpayment where  uid=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
<h3 class="content-header-title mb-0 d-inline-block">
           Payment Details<br>
          </h3> <br>
<table class="table mb-0">
<tr>
  <th>Transaction ID</th>
  <td><?php echo $row['transactionid'];?></td>
</tr>
<tr>
  <th>Receipt</th>
  <td><a href="receipt/<?php echo $row['receipt'];?>" target="_blank">View File </a></td>
</tr>
</table>
</div>
<?php }} ?>
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbladmapplications where  uid=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>

<table align="left">
<tr>
    <th colspan="2"><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaration : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.
    
</th>    
  </tr>
</table>
<table align="center">
  <tr>
<th><img src="usersign/<?php echo $row['sign'];?>" width="200" height="100"></th><br>
</tr>
</table>
<?php }} ?>
<?php 

if ($row['AdminStatus']==""){
?>
<div class="col-xl-4 col-lg-12">
            
            
          </div>
<?php }} } else { ?>

        <?php } ?>
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
