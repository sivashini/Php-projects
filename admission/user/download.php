<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('../fpdf/fpdf.php');
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbladmapplications where  uid=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
  $uid=$row->uid;
  $coursename=$row->coursename;
  $fname=$row->fname; 
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
  $upic=$_FILES["upic"]["name"]; }
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('logo.png',10,6,130);
$pdf->Image('userpic.png',150,8,40);
$pdf->Ln(40);
$pdf->SetTextColor(85, 53, 20);
$pdf->SetFont('Arial', 'B', 25);
$pdf->MultiCell(0, 6, 'Phd Admission 2022-2023', 0, "C");
$pdf->Ln();
$pdf->SetFont('Arial','B','13');
$pdf->Cell(65, 11, 'Application ID',1, 0); 
$pdf->Cell(120, 11, $uid,1, 1);
$pdf->Cell(65, 11, 'Specialization For',1, 0); 
$pdf->Cell(120, 11, $coursename,1, 1); 
$pdf->Cell(65, 11, 'Name',1, 0);
$pdf->Cell(120, 11, $fname,1, 1);
$pdf->Cell(65, 11, 'Date Of Birth',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Gender',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Residential Category',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Application Category',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Reservation Category',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Special Reservation',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Permanent Address',1, 0); 
$pdf->Cell(120, 11, '',1, 1);
$pdf->Cell(65, 11, 'Address for Communication',1, 0); 
$pdf->Cell(120, 11, '',1, 1);

$pdf->Ln(10);
$pdf->Cell(27, 11, 'Graduation',1, 0); 
$pdf->Cell(53, 11, 'University',1, 0);
$pdf->Cell(15, 11, 'Year',1, 0);
$pdf->Cell(42, 11, 'Percentage/CGPA',1, 0);
$pdf->Cell(23, 11, 'Branch',1, 0);
$pdf->Cell(25, 11, 'Class',1, 1);
$pdf->Cell(27, 17, '',1, 0); 
$pdf->Cell(53, 17, '',1, 0);
$pdf->Cell(15, 17, '',1, 0);
$pdf->Cell(42, 17, '',1, 0);
$pdf->Cell(23, 17, '',1, 0);
$pdf->Cell(25, 17, '',1, 1);
$pdf->Cell(27, 17, '',1, 0); 
$pdf->Cell(53, 17, '',1, 0);
$pdf->Cell(15, 17, '',1, 0);
$pdf->Cell(42, 17, '',1, 0);
$pdf->Cell(23, 17, '',1, 0);
$pdf->Cell(25, 17, '',1, 1);
$pdf->Ln(25);
$pdf->Cell(0,10,'Page '.$pdf->PageNo().'',0,0,'C');

$pdf->AddPage();
$pdf->Image('logo.png',10,6,190);
$pdf->Ln(45);
$pdf->Cell(115, 11, 'Total Number of Years & Months as on 10.06.2022',1, 0); 
$pdf->Cell(70, 11, '',1, 1);
$pdf->Cell(70, 11, 'Institution',1, 0); 
$pdf->Cell(60, 11, 'Designation',1, 0);
$pdf->Cell(55, 11, 'Service Period',1, 1);
$pdf->Cell(70, 11, '',1, 0); 
$pdf->Cell(60, 11, '',1, 0);
$pdf->Cell(55, 11, '',1, 1);
$pdf->Cell(70, 11, '',1, 0); 
$pdf->Cell(60, 11, '',1, 0);
$pdf->Cell(55, 11, '',1, 1);




$pdf->MultiCell(185,7,"Declaration :
I hereby state that the facts mentioned above are true and correct to the best of my knowledge and belief.I understand that my application will be summarily rejected if found incorrect and incomplete in respect of the eligibility criteria for the admission.",1,1);
 
$pdf->Ln(10);
$myImage = "sign.png";
$pdf->Image($myImage, 160, $pdf->GetY(), 30,30);
$pdf->Ln(30);
$pdf->SetTextColor(85, 53, 20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->MultiCell(0, 6, 'Signature       ', 20, "R");
$pdf->Ln(85);
$pdf->Cell(0,10,'Page '.$pdf->PageNo().'',0,0,'C');



$pdf->Output();
}
?>
