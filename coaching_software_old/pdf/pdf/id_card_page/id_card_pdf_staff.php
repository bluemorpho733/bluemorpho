<?php
include("../../../admin/attachment/session.php");
$que="select * from  coaching_info_general";
$run=mysql_query($que);
while($row=mysql_fetch_array($run)){

	$coaching_info_coaching_name = $row['coaching_info_coaching_name'];
	$coaching_info_coaching_contact_no = $row['coaching_info_coaching_contact_no'];
	$coaching_info_coaching_code = $row['coaching_info_coaching_code'];
	$coaching_info_coaching_address = $row['coaching_info_coaching_address'];
}

$query121="select * from coaching_document";
$run121=mysql_query($query121) or die(mysql_error());
while($row121=mysql_fetch_array($run121)){
 	$coaching_info_principal_seal=$row121['coaching_info_principal_seal'];
	$coaching_info_principal_signature=$row121['coaching_info_principal_signature'];
	$coaching_info_logo=$row121['coaching_info_logo'];
	$path1="data:image/jpeg;base64,".$coaching_info_logo;
}
require('../fpdf.php');

class PDF extends FPDF
{

protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{			$this->SetFont('Times','',13);
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(7,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('Times',$style,13);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

function Heading($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(220,220,220);
    // Title
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}

function Body($file)
{
    // Read text file
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,$file);
    // Line break
    $this->Ln();
   
}

// Page header
function Header()
{
    
}

// Page footer
function Footer()
{
    
}

function Table1()
{ 

global $coaching_info_coaching_name,$coaching_info_coaching_address,$coaching_info_coaching_contact_no,$coaching_info_logo,$emp_name,$emp_categories,$student_roll_no,$database_blob1,$emp_dob,$student_father_contact_number,$student_photo,$student_image,$roll_no,$emp_id,$coaching_info_coaching_code,$emp_designation,$path1;


    $coaching_info_coaching_name=strtoupper($coaching_info_coaching_name);
	$c1=explode(' ',$coaching_info_coaching_name);
	$c2=count($c1);
	$x=0;
	$y=0;
	$y1=0;
	$x1=0;
	$x2=0;
	 $coaching_info_coaching_name_1= "";
	$coaching_info_coaching_name_2= "";
	$coaching_info_coaching_name_3= "";
	for($z=0;$z<$c2;$z++){
	 $x=strlen($c1[$z]);
	$y=$y+$x;
	if($y>15){
	if($x1==0){
	$y1='16';
	$x1++;
	}
	}
	if($y>31){
    if($x2==0){
	$y1='32';
	$x2++;
	}
	}
	$y1=$y1+$x;

	$y=$y1;
	if($y1<17){
	$coaching_info_coaching_name_1=$coaching_info_coaching_name_1.' '.$c1[$z];
	}elseif($y1<33){
	$coaching_info_coaching_name_2=$coaching_info_coaching_name_2.' '.$c1[$z];
	}else{
	$coaching_info_coaching_name_3=$coaching_info_coaching_name_3.' '.$c1[$z];
	}
	}

	$coaching_info_coaching_address1=strtoupper($coaching_info_coaching_address);
	$c1=explode(' ',$coaching_info_coaching_address1);
	$c2=count($c1);
	$x=0;
	$y=0;
	$y1=0;
	$x1=0;
	$x2=0;
	$coaching_info_coaching_address1= "";
	$coaching_info_coaching_address2= "";
	$coaching_info_coaching_address3= "";
	for($z=0;$z<$c2;$z++){
	 $x=strlen($c1[$z]);
	$y=$y+$x;
	if($y>15){
	if($x1==0){
	$y1='16';
	$x1++;
	}
	}
	if($y>31){
    if($x2==0){
	$y1='32';
	$x2++;
	}
	}
	$y1=$y1+$x;

	$y=$y1;
	if($y1<40){
	$coaching_info_coaching_address1=$coaching_info_coaching_address1.' '.$c1[$z];
	}elseif($y1<133){
	$coaching_info_coaching_address2=$coaching_info_coaching_address2.' '.$c1[$z];
	}else{
	$coaching_info_coaching_address3=$coaching_info_coaching_address3.' '.$c1[$z];
	}
	}
$height=0;
$height1=92;
$width=0;
$width1=69;
$horizontal=0;
$vertical=0;

//if($_GET['staff_id_card_info']){
///$employee_id=$_GET['staff_id_card_info'];
//$employee_id=array($employee_id);
///}else{
$employee_id=$_POST['staff_id_card_info'];	
//}
$count=count($employee_id);
for($j=0;$j<$count;$j++){
$que1="select * from employee_info where emp_id='$employee_id[$j]'";
$run1=mysql_query($que1);
while($row1=mysql_fetch_array($run1)){
   
	$emp_name=$row1['emp_name'];
	$emp_categories=$row1['emp_categories'];
	$emp_id=$row1['emp_id'];
	$emp_dob1=$row1['emp_dob'];
	$emp_dob2=explode("-",$emp_dob1);
	$emp_dob=$emp_dob2[2]."-".$emp_dob2[1]."-".$emp_dob2[0];
	$emp_mobile=$row1['emp_mobile'];
    $emp_designation=$row1['emp_designation'];
}
$que1="select * from employee_document where emp_id='$employee_id[$j]'";
$run1=mysql_query($que1);
$emp_photo='';
while($row1=mysql_fetch_array($run1)){
$emp_photo=$row1['emp_photo'];
$emp_photo1="data:image/jpeg;base64,".$emp_photo;
}

    

if($horizontal>2 && $vertical>1){
    $horizontal=0;
    $vertical=0;
	$this->Cell(52,0,'',0,0,'C');
	$this->Ln();
}
  if($horizontal>2)
  {
  $horizontal=0;
  $vertical++;
  }
  $height=$height1*$vertical;
  $width=$width1*$horizontal;

		//$this->Image('../id_card_image/id_card_full_background_1.png',10+$width,10+$height,52,82);
  
		$this->Image('../id_card_image/id_card_background_header_4.png',10+$width,10+$height,52,13.5);
		
		if($coaching_info_logo==null){
		$this->Image('../../../images/blank_logo.png',11+$width,22+$height,11,12);
		}
		else{
		$this->Image($path1,11+$width,22+$height,11,12,'jpeg');
		}
		
		if($emp_photo==''){
		$this->Image('../../../images/blank.jpg',26.7+$width,37.2+$height,18.6,17.6);
		}
		else{
		$this->Image($emp_photo1,26.7+$width,37.2+$height,18.6,17.6,'jpeg');
		}
		$this->Image('../id_card_image/id_card_background_footer_4.png',10+$width,76+$height,52,16);	

if($horizontal>0)
  {
  $this->Ln(-92);
$this->SetLeftMargin(10+$width);  
  }

        $this->SetLeftMargin(10+$width);
        $this->SetFont('Times','B',8.5);
		$this->SetTextColor(0,0,0);
		$this->Cell(17,0,'',0,0,'C');
		$this->Ln();
		$this->Cell(21,6,'coaching Code -',0,0,'C');
		$this->Cell(10,6,'',0,0,'C');
		$this->Cell(21,6,''.$coaching_info_coaching_code,0,0,'C');
		$this->Ln();
		
		//--------------------------------------------
		
		$this->Cell(52,4,'',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(9,5,'',0,0,'C');
		$this->Cell(38,5,''.$coaching_info_coaching_name_1,0,0,'C');
		$this->Ln();
		
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(38,4,''.$coaching_info_coaching_name_2,0,0,'C');
		$this->Ln();
		
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(38,4,''.$coaching_info_coaching_name_3,0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,4,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		// image border code
		$this->SetLineWidth(0.25);
		$this->SetDrawColor(52,53,54);
		$this->Cell(16.5,15,'',0,0,'C');
		$this->Cell(19,18,'',1,0,'C');
		$this->Cell(16.5,15,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,3,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(52,5,''.$emp_name,0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Desig.',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$emp_designation,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Emp Id.',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$emp_id,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'D.O.B.   ',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$emp_dob,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Mobile   ',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$emp_mobile,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(26,5,'',0,0,'L');
		$this->Ln();
		
		$this->SetFont('Times','B',6.5);
		$this->SetTextColor(0,0,0);
		$this->Cell(20,2,'',0,0,'L');
		$this->Cell(12,2,''.$coaching_info_coaching_address1,0,0,'C');
		$this->Ln();

		$this->SetFont('Times','B',6.5);
		$this->SetTextColor(0,0,0);
		$this->Cell(19,2,'',0,0,'L');
		$this->Cell(12,2,''.$coaching_info_coaching_address2,0,0,'C');
		$this->Ln();
		
		//--------------------------------------------
		$this->SetFont('Times','B',8);
		$this->SetTextColor(0,0,0);
		$this->Cell(18,3,'Contact No.- ',0,0,'R');
		$this->SetFont('Times','',8);
		$this->Cell(20,3,''.$coaching_info_coaching_contact_no,0,0,'L');
		$this->Ln(-79);
		
		$this->SetLineWidth(0.35);
		$this->SetDrawColor(231,227,234);
		$this->Cell(52,82,'',1,0,'C');
	    $this->Ln();
	    
if($horizontal>2)
{
$this->Cell(52,10,'',1,0,'C');
$this->Ln();	
}else{
$this->Ln(10);	
}
$horizontal++;
}
//---------------------------------------------------------------------------------------------------
		
	  
}




function sign($s1, $s2){

	    $this->Cell(90,6,$s1,'',0,'L',false);
        $this->Cell(90,6,$s2,'',0,'R',false);
		$this->Ln();
}
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
	
	//  $pdf->SetLeftMargin(30);
	    $pdf->Ln();
		$pdf->Table1();
	
$file_name="id_cards_".$emp_categories.".pdf";
$pdf->Output('I',$file_name);
?>