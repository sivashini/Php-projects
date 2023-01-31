<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['uid'];
    $dateofbirthdoc=$_FILES["dateofbirthdoc"]["name"];
    $residencedoc=$_FILES["residencedoc"]["name"];
    $nationalitydoc=$_FILES["nationalitydoc"]["name"];
    $communitydoc=$_FILES["communitydoc"]["name"];
    $specialdoc=$_FILES["specialdoc"]["name"];
    $experiencedoc=$_FILES["experiencedoc"]["name"];
    $gramarksheet=$_FILES["gramarksheet"]["name"];
    $pgmarksheet=$_FILES["pgmarksheet"]["name"];
$extensiondoc = substr($dateofbirthdoc,strlen($dateofbirthdoc)-4,strlen($dateofbirthdoc));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif",".pdf");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extensiondoc,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/ pdf format allowed');</script>";
}
else
{
//rename upload file
$dateofbirthdoc=$dateofbirthdoc.$uid.$extensiondoc;
$residencedoc=$residencedoc.$uid.$extensiondoc;
$nationalitydoc=$nationalitydoc.$uid.$extensiondoc;
$communitydoc=$communitydoc.$uid.$extensiondoc;
$specialdoc=$specialdoc.$uid.$extensiondoc;
$experiencedoc=$experiencedoc.$uid.$extensiondoc;
$gramarksheet=$gramarksheet.$uid.$extensiondoc;
$pgmarksheet=$pgmarksheet.$uid.$extensiondoc;
     move_uploaded_file($_FILES["dateofbirthdoc"]["tmp_name"],"userdocs/".$dateofbirthdoc);
     move_uploaded_file($_FILES["residencedoc"]["tmp_name"],"userdocs/".$residencedoc);
     move_uploaded_file($_FILES["nationalitydoc"]["tmp_name"],"userdocs/".$nationalitydoc);
     move_uploaded_file($_FILES["communitydoc"]["tmp_name"],"userdocs/".$communitydoc);
     move_uploaded_file($_FILES["specialdoc"]["tmp_name"],"userdocs/".$specialdoc);
     move_uploaded_file($_FILES["experiencedoc"]["tmp_name"],"userdocs/".$experiencedoc);
     move_uploaded_file($_FILES["gramarksheet"]["tmp_name"],"userdocs/".$gramarksheet);
     move_uploaded_file($_FILES["pgmarksheet"]["tmp_name"],"userdocs/".$pgmarksheet);
    $query=mysqli_query($con,"insert into tbldocument(uid,dateofbirthdoc,residencedoc,nationalitydoc,communitydoc,specialdoc,experiencedoc,gramarksheet,pgmarksheet) value('$uid','$dateofbirthdoc','$residencedoc','$nationalitydoc','$communitydoc','$specialdoc','$experiencedoc','$gramarksheet','$pgmarksheet')");
    if ($query) {  
     echo '<script>alert("Data has been added successfully.")</script>';
    echo "<script>window.location.href ='payment.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
      echo "<script>window.location.href ='upload-doc.php'</script>";
    } 
}
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title> Admissions || Upload Documents</title>
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
           Upload Documents
          </h3>          
        </div>
   
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
</table>
</div>
<?php 

if ($row['AdminStatus']==""){
?>
<div class="col-xl-4 col-lg-4">
            <br><br>
            <a href="payment.php">
              <i class="btn btn-info btn-min-width mr-1 mb-1">NEXT</i>
            </a>&nbsp;&nbsp;&nbsp;
          
            <a href="edit-document.php?editid=<?php echo $row['ID'];?>">Edit Documents</a>
		 
          </div>
<?php }}} else { ?>
<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Documents</h4>

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
  <h5>Proof of Date of Birth (Birth Certificate/SSLC/HSC)</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="dateofbirthdoc" name="dateofbirthdoc"  type="file" required>
    

    </div>
</fieldset>
                 
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Residence Certificate issued by Tahsildar not older than June, 2021</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="residencedoc" name="residencedoc"  type="file" required>
    </div>
</fieldset>                 
</div>
</div>
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Nationality Certificate (Aadhaar/Driving License/Passport/EPIC)</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="nationalitydoc" name="nationalitydoc"  type="file" required>
    </div>
</fieldset>                 
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Community Certificate (if applicable)</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="communitydoc" name="communitydoc"  type="file">
    </div>
</fieldset>                 
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Certificates for Special Reservation (if applicable)</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="specialdoc" name="specialdoc"  type="file">
    </div>
</fieldset>             
                
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Experience Certificate's</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="experiencedoc" name="experiencedoc"  type="file">
    </div>
</fieldset>             
                
</div>
</div>

<div class="row">
<div class="col-xl-6 col-lg-12">
  <fieldset>
  <h5>Graduation Certificate</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="gramarksheet" name="gramarksheet"  type="file" required>
    </div>
</fieldset>
 </div>
 

<div class="col-xl-6 col-lg-12">
  <fieldset>
  <h5>Post Graduation Certificate</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="pgmarksheet" name="pgmarksheet"  type="file" required>
    </div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">SUBMIT</button>
</div>
<div class="col-xl-6 col-lg-12">
            
	  <a href="payment.php">
		  <i class="btn btn-info btn-min-width mr-1 mb-1">NEXT</i>
		</a>&nbsp;

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
