<?php
include("../../../admin/attachment/session.php");

$query12="select * from coaching_info_general";
$run12=mysql_query($query12) or die(mysql_error());
while($row12=mysql_fetch_array($run12)){
$coaching_info_coaching_name=$row12['coaching_info_coaching_name'];
$coaching_info_coaching_state=$row12['coaching_info_coaching_state'];
$coaching_info_coaching_district=$row12['coaching_info_coaching_district'];
$coaching_info_coaching_city=$row12['coaching_info_coaching_city'];
$coaching_info_coaching_pincode=$row12['coaching_info_coaching_pincode'];
$coaching_info_coaching_address=$row12['coaching_info_coaching_address'];
$coaching_info_coaching_contact_no=$row12['coaching_info_coaching_contact_no'];
$coaching_info_coaching_email_id=$row12['coaching_info_coaching_email_id'];
$coaching_info_coaching_website=$row12['coaching_info_coaching_website'];
$coaching_info_coaching_code=$row12['coaching_info_coaching_code'];
}

$query121="select * from coaching_document";
$run121=mysql_query($query121) or die(mysql_error());
while($row121=mysql_fetch_array($run121)){
$coaching_info_principal_seal=$row121['coaching_info_principal_seal'];
$coaching_info_principal_signature=$row121['coaching_info_principal_signature'];
$coaching_info_logo=$row121['coaching_info_logo'];
$path1="data:image/jpeg;base64,".$coaching_info_logo;
}

$s_no=$_GET['s_no'];
$query="select * from employee_info where s_no='$s_no'";
$run=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_array($run)){

	$emp_name = $row['emp_name'];
	$emp_gender = $row['emp_gender'];
	if($emp_gender=='Male'){
	    $so_do_co="S/O";
	    $male="He";
	    $male1="His";
	}elseif($emp_gender=='Female'){
	    $so_do_co="D/O / W/O";
	    $male="She";
	    $male1="Her";
	}else{
	    $so_do_co="C/O";
	}
	$emp_father = $row['emp_father'];
	$emp_mobile = $row['emp_mobile'];
	$emp_doj1 = $row['emp_doj'];
	if($emp_doj1!=''){
	$emp_doj2=explode("-",$emp_doj1);
	$emp_doj=$emp_doj2[2]."-".$emp_doj2[1]."-".$emp_doj2[0];
	}else{
	$emp_doj=$row['emp_doj'];
	}
	$emp_designation = $row['emp_designation'];
	$emp_pan_card_no = $row['emp_pan_card_no'];
	$emp_bank_name = $row['emp_bank_name'];
	$emp_account_no = $row['emp_account_no'];
	$emp_basic_salary = $row['emp_basic_salary'];
	$emp_pf_number = $row['emp_pf_number'];
	$emp_photo = $row['emp_photo'];
    $emp_uid_no = $row['emp_uid_no'];
    $emp_subject_preferred = $row['emp_subject_preferred'];
    $emp_drop_date1 = $row['emp_drop_date'];
    if($emp_drop_date1!=''){
	$emp_drop_date2=explode("-",$emp_drop_date1);
	$emp_drop_date=$emp_drop_date2[2]."-".$emp_drop_date2[1]."-".$emp_drop_date2[0];
	}else{
	$emp_drop_date=$row['emp_drop_date'];
	}
	
	//$path="../../documents/Employee/".$emp_id;		
}

require('../fpdf1.php');

class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

// Page header
function Header()
{
$this->Image('experience_certificate.jpg',1,1,295,208);	
}

// Page footer
function Footer()
{
	$this->SetFont('Arial','I',15);
	$this->SetXY(30,185);
	$this->SettextColor(237,45,0);
	$this->Cell(70,10,'',0,0,'C');	
	$this->Cell(100,10,'',0,0,'C');
	$this->Cell(70,10,'Administrator Signature',0,0,'C');		
}   

function Table1()
{
    
    global $coaching_info_coaching_name,$male,$male1,$coaching_info_coaching_state,$coaching_info_coaching_district,$coaching_info_coaching_city,$coaching_info_coaching_pincode,$coaching_info_coaching_address,$coaching_info_coaching_contact_no,$coaching_info_coaching_email_id,$coaching_info_dise_code,$coaching_info_coaching_code,$coaching_info_registration_code,$emp_name,$emp_gender,$emp_father,$emp_mobile,$emp_doj1,$emp_doj2,$emp_doj,$emp_designation,$emp_uid_no,$emp_subject_preferred,$emp_drop_date,$so_do_co,$coaching_info_principal_seal,$coaching_info_principal_signature,$path1;
    
	$this->SetTextColor(0,0,0);
	$this->Cell(5,5,'',0,0,'C');
	$this->Ln();

    $this->SetFont("Times","U","32");
	$this->Cell(90,10,'',0,0,'C');  
	$this->Cell(100,15,''.$coaching_info_coaching_name,0,0,'C');
	$this->Ln();

	$this->SettextColor(0,0,0);
	$this->SetFont('Times','U',28);
	$this->Cell(100,5,'',0,0,'C');
	$this->Ln();
	$this->Cell(90,10,'',0,0,'C');  
	$this->Cell(100,15,'Teacher Experience Certificate',0,0,'C');
	$this->Ln();
	$this->SetFont('Times','I',18);
	$this->Cell(90,10,'',0,0,'C');  
	$this->Cell(100,10,'To Whome It May Concern:',0,0,'C');
	$this->Ln();
	$this->Cell(40,10,'',0,0,'C');  
	$this->Cell(50,10,'This is to certify that',0,0,'C');
	$this->Cell(75,10,''.strtoupper($emp_name),0,0,'C');
	$this->Cell(29,10,''.$so_do_co,0,0,'C');
	$this->Cell(78,10,''.strtoupper($emp_father),0,0,'C');
	$this->Ln();
	$this->Cell(50,10,'',0,0,'C');
	$this->Cell(50,10,'has worked in ',0,0,'C');
	$this->Cell(120,10,''.strtoupper($coaching_info_coaching_name),0,0,'C');
	$this->Cell(20,10,'as',0,0,'C');
	$this->Ln();
	$this->Cell(60,10,'',0,0,'C');
	$this->Cell(60,10,'"'.strtoupper($emp_subject_preferred).' TEACHER"',0,0,'C');
	$this->Cell(20,10,'from   ',0,0,'C');
	$this->Cell(70,10,$emp_doj.'   to   '.$emp_drop_date.' .',0,0,'C');
	$this->Ln();
	$this->Cell(50,10,'',0,0,'C');
	$this->Cell(190,10,$male.' teached    '.strtoupper($emp_subject_preferred).'    Classes.',0,0,'C');
	//$this->Cell(120,10,'Classes from'.'     '.'to'.'    '.'Classes.',0,0,'C');
	$this->Ln();
	$this->Cell(60,10,'',0,0,'C');
	$this->Cell(160,10,$male. ' has shown the best possible results with good academic ',0,0,'C');
	$this->Ln();

	$this->Cell(50,10,'',0,0,'C');
	$this->Cell(180,10,'performance. '.$male. ' has been very innovative in '.$male1.' proffession and '.$male1.' ',0,0,'C');
	$this->Ln();

	$this->Cell(50,10,'',0,0,'C');
	$this->Cell(180,10,'performence in the coaching has been pleasent.',0,0,'C');
	$this->Ln();
	$this->Cell(70,10,'',0,0,'C');
	$this->Ln();

	$this->Cell(50,10,'',0,0,'C');
	$this->Cell(180,10,'We wish to '.$male1.' bright future & good luck in '.$male1.' career.',0,0,'C');
	$this->Ln();

	$this->Cell(40,10,'',0,0,'C');
	$this->Cell(20,10,'Name:',0,0,'C');
	$this->Cell(70,10,''.strtoupper($emp_name),0,0,'C');
	$this->Cell(10,10,'',0,0,'C');
	$this->Cell(100,10,'Join from'.'  '.$emp_doj.'  to  '.'  '.$emp_drop_date,0,0,'C');
	$this->Ln();

	$this->Cell(40,10,'',0,0,'C');
	$this->Cell(40,10,'Designation: '.$emp_designation,0,0,'C');
	$this->Image($path1,160,162,30,30,'jpeg');	
}

function sign($s1, $s2){

	    $this->Cell(90,6,$s1,'',0,'L',false);
        $this->Cell(90,6,$s2,'',0,'R',false);
		$this->Ln();
}



}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Table1();	
$pdf->Output('');
?>