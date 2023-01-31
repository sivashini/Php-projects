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
    echo '<script>alert("Data has been captured successfully.")</script>';
    echo "<script>window.location.href ='upload-doc.php'</script>";
  }
  else
    {
     echo '<script>alert("Something went wrong. Please try again.")</script>';
         echo "<script>window.location.href ='admission-form.php'</script>";
    }
}
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Admission|| Admission Form</title>
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
<tr>
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
  <th>Address for Communication</th>
  <td><?php echo $row['coradd'];?>,<?php echo $row['city'];?>,<?php echo $row['state'];?>,<?php echo $row['zipcode'];?></td>
</tr>

</table>
<table class="table mb-0">
<tr>
<th>Graduation</th>
   <th>University</th>
    <th>Year</th>
     <th>Percentage/CGPA</th>
       <th>Branch</th>
       <th>Class</th>
</tr>

<tr>  
  <td><?php echo $row['ug'];?></td>
  <td><?php echo $row['grauni'];?></td>
  <td><?php echo $row['grayop'];?></td>
  <td><?php echo $row['graper'];?>%</td>
  <td><?php echo $row['grastream'];?></td>
  <td><?php echo $row['graclass'];?></td>
</tr>
<tr>  
  <td><?php echo $row['pg'];?></td>
  <td><?php echo $row['pguni'];?></td>
  <td><?php echo $row['pgyop'];?></td>
  <td><?php echo $row['pgper'];?>%</td>
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
</table>

<table>
<tr>
    <th colspan="2"><font color="red">Declaration : 

    </font>I hereby state that the facts mentioned above are true and correct to the best of my knowledge and belief. <br>I understand that my application will be summarily rejected if found incorrect and incomplete in respect of the eligibility criteria for the admission.<br />
    
</th>
</tr>
</table>
<table align='right'>
<tr>
<th><img src="usersign/<?php echo $row['sign'];?>" width="200" height="100"></th>
    
  </tr>
</table>
</div>
<?php 

if ($row['AdminStatus']==""){
?>
<p style="text-align: center;font-size: 20px;"><a href="edit-appform.php?editid=<?php echo $row['ID'];?>">Edit Details</a></p>
<?php }} } else { ?>
<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Admission Form</h4>

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
  <h5>Specialization Applied for                  </h5>
   <div class="form-group">
   <select name='coursename' id="coursename" class="form-control white_bg" required>
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
  <h5>Applicant Photo                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="upic" name="upic"  type="file" onchange="Filevalidation()" required>    
    <small>* Image should be 50kb-100kb</small>
    <script>
    Filevalidation = () => {
        const fi = document.getElementById('upic');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 400) {
                    alert(
                      "File sizee too large, please select a file less than 300 KB");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
    }
</script>
    </div>
</fieldset>                  
</div>
 </div>               
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>First Name</h5>
   <div class="form-group">
   <input class="form-control white_bg" id="fname" name="fname" placeholder="FirstName" type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Last Name</h5>
   <div class="form-group">
   <input class="form-control white_bg" id="lname" name="lname" placeholder="LastName" type="text" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB</h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="date" required>
          
    </div>

</fieldset>                  
</div>

<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Gender</h5>
   <div class="form-group">
   <select class="form-control white_bg" id="gender" name="gender"  required>
    <option value="">--</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
   </select>
</div>
</fieldset>
</div>
</div>

<div class="row">
  <div class="col-xl-4 col-lg-12">
  <fieldset>
    <h5>Residential Category : </h5>
   
    <select class="form-control white_bg" id="residential" name="residential"  required onchange="populate(this.id,'reservation')">
    <option value="">Select Category</option>
<option value="U.T. of Puducherry">U.T. of Puducherry (UTP)</option>
<option value="Other State">Other State (OS)</option>
<option value="Foreign National">Foreign National (FN)</option>

   </select>
              </fieldset>
  </div>

<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Application Type              </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="application" name="application"  required>
    <option value="">Select</option>
<option value="Full Time">Full Time</option>
<option value="Part Time (Internal)">Part Time (Internal)</option>
<option value="Part Time (External)">Part Time (External)</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
                    </div>
  <div class="row">
  <div class="col-xl-4 col-lg-12">
    <h5>Reservation Category : </h5>
   
<select class="form-control white_bg" id="reservation" name="reservation"  required>
    <option value="">Select Category</option>

   </select>

  </div>
  <script>
  function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
 
  
  s2.innerHTML = "";


  if(s1.value == "U.T. of Puducherry")
  {
    var optionArray = ['general|General','OBC|OBC','MBC|MBC','EBC|EBC','BCM|BCM','BT|BT','SC|SC','ST|ST'];
    
  }

  else if(s1.value == 'Other State')
  {
    var optionArray = ['open category|Open Category(OC)','OBC|OBC','SC|SC','ST|ST'];
  }

  for(var option in optionArray)
  {
    var pair = optionArray[option].split("|");
    var newoption = document.createElement("option");

    newoption.value = pair[0];
    newoption.innerHTML=pair[1];
    s2.options.add(newoption);
  }
}
  </script>

 

<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Special Reservation</h5>
   <div class="form-group">

   <select class="form-control white_bg" id="special" name="special">
    <option value="">Select</option>
<option value="Not Applicable">Not Applicable</option>   
<option value="Person with Disabilities (PwD)">Person with Disabilities (PwD)</option>
<option value="Meritorious Sports Person (MSP)">Meritorious Sports Person (MSP)</option>
<option value="Wards of Ex-Service Men (ESM)">Wards of Ex-Service Men (ESM)</option>
<option value="Children / Grand Children of Freedom Fighter (FF)">Children / Grand Children of Freedom Fighter (FF)</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Permanent Address</h5>
   <div class="form-group">
   <input class="form-control white_bg" id="peradd" name="peradd"  type="text" placeholder="Door No, Street" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="percity" name="percity"  type="text" placeholder="City" required>
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="perstate" name="perstate"  type="text" placeholder="State" required>
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="perzipcode" name="perzipcode"  type="number" placeholder="Pincode" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>
    </div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Address for Correspondence</h5>
   <div class="form-group">
   <input class="form-control white_bg" id="coradd" name="coradd"  type="text" placeholder="Door No, Street" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="city" name="city"  type="text" placeholder="City" required>
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="state" name="state"  type="text" placeholder="State" required>
    </div>
</fieldset>
</div>
<div class="col-xl-4 col-lg-12">
  <fieldset>  
   <div class="form-group">
   <input class="form-control white_bg" id="zipcode" name="zipcode"  type="number" placeholder="Pincode" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" required>
   
    </div>
</fieldset>
</div>
</div>

<div class="row" style="margin-top: 2%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title">Acadamic Details</div></div>
<div class="row">
<div class="col-xl-12 col-lg-12">
  <table class="table mb-0">
<tr>
  <th>Degree(UG/PG)</th>
   <th>University</th>
    <th>Year</th>
     <th>CGPA/Percentage</th>
       <th>Discipline</th>
       <th>Class</th>
</tr>
<th>
   <select class="form-control white_bg" id="ug" name="ug"  required>
    <option value="">Select UG</option>
<option value="B.E">B.E</option>
<option value="B.Tech">B.Tech</option>
<option value="B.Sc">B.Sc</option>
<option value="Other">Other</option>
   </select></th>
<td>   <input class="form-control white_bg" id="grauni" name="grauni" placeholder=" University"  type="text" required></td>
<td>   <input class="form-control white_bg" id="grayop" name="grayop" placeholder="Year"  type="number" required></td>
<td>   <input class="form-control white_bg" id="graper" name="graper" placeholder="CGPA/Percentage"  type="decimal"% required></td>
<td>   <input class="form-control white_bg" id="grastream" name="grastream" placeholder="Discipline"  type="text" required></td>
<td>   <select class="form-control white_bg" id="graclass" name="graclass"  placeholder="Class"  type="text" required>
    <option value="">Select Class</option>
<option value="First Class with Distinction">First Class with Distinction</option>
<option value="First Class">First Class</option>
<option value="Second Class">Second Class </option>
   </select></td>
</tr>
<tr>
<th><select class="form-control white_bg" id="pg" name="pg"  required>
    <option value="">Select PG</option>
<option value="M.E">M.E</option>
<option value="M.Tech">M.Tech</option>
<option value="M.Sc">M.Sc</option>
<option value="M.C.A">M.C.A</option>
<option value="Other">Other</option>
</th>
<td>   <input class="form-control white_bg" id="pguni" name="pguni" placeholder="University"  type="text" required></td>
<td>   <input class="form-control white_bg" id="pgyop" name="pgyop" placeholder="Year"  type="number" required></td>
<td>   <input class="form-control white_bg" id="pgper" name="pgper" placeholder="CGPA/Percentage"  type="decimal"% required></td>
<td>   <input class="form-control white_bg" id="pgstream" name="pgstream" placeholder="Discipline"  type="text" required></td>
<td>    <select class="form-control white_bg" id="pggraclass" name="pggraclass"  placeholder="Class"  type="text" required>
<option value="">Select Class</option>
<option value="First Class with Distinction">First Class with Distinction</option>
<option value="First Class">First Class</option>
<option value="Second Class">Second Class </option>
   </select></td>
</tr>
</table>
</div>
</div>
</hr>
<div class="row" style="margin-top: 2%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title">Professional Experience</h4>
  <div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Total Number of Years  & Months as on 30.11.2021                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="experience" name="experience"  type="text" required>
    
    </div>
</fieldset>                  
</div>
<hr />
  </div>
</div>
<div class="row">
  &nbsp;&nbsp;&nbsp;<h5>Chronological order of employment </h5>
  (*If needed Use more than one row)
<div class="col-xl-12 col-lg-12">
<table id="addtable" class="table mb-0">
<tr>
  <th>Institution/Organization name</th>
   <th>Designation</th>    
     <th>Service Period</th>
       
</tr>
<td>   <input class="form-control white_bg" id="institution" name="institution" placeholder="Institution/Organization name"  type="text" required></td>
<td>   <input class="form-control white_bg" id="designation" name="designation" placeholder="Designation"  type="text" required></td>
<td>   <input class="form-control white_bg" id="service" name="service" placeholder="Service Period"  type="text" required><small>*dd-mm-yyyy to dd-mm-yyyy</small>
</td>

</tr>

</tr>
<td>   <input class="form-control white_bg" id="institutionone" name="institutionone" placeholder="Institution/Organization name"  type="text" ></td>
<td>   <input class="form-control white_bg" id="designationone" name="designationone" placeholder="Designation"  type="text" ></td>
<td>   <input class="form-control white_bg" id="serviceone" name="serviceone" placeholder="Service Period"  type="text" ><small>*dd-mm-yyyy to dd-mm-yyyy</small></td>

</tr>
</tr>
<td>   <input class="form-control white_bg" id="institutiontwo" name="institutiontwo" placeholder="Institution/Organization name"  type="text" ></td>
<td>   <input class="form-control white_bg" id="designationtwo" name="designationtwo" placeholder="Designation"  type="text" ></td>
<td>   <input class="form-control white_bg" id="servicetwo" name="servicetwo" placeholder="Service Period"  type="text" ><small>*dd-mm-yyyy to dd-mm-yyyy</small></td>

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
<h5><b>I hereby state that the facts mentioned above are true and correct to the best of my knowledge and belief. I understand that my application will be summarily rejected if found incorrect and incomplete in respect of the eligibility criteria for the admission.</b></h5>

 </div>
 </div>               
<div class="row"> 
<div class="col-xl-4 col-lg-12">
<fieldset>
<lable>Signature :</lable>
<div class="form-group">
    <input class="form-control white_bg" id="sign" name="sign"  type="file" required>
    <small>* Image should be 50kb-100kb</small>
    </div>
 </fieldset>  
</div>
</div>

<div class="row" style="margin-top: 2%">
<div class="col-xl-4 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">SUBMIT</button>
</div>

</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
