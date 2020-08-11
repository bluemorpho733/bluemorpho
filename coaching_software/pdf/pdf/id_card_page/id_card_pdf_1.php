<?php
include("../../../admin/attachment/session.php");
$que="select * from  coaching_info_general";
$run=mysql_query($que);
while($row=mysql_fetch_array($run)){

	$coaching_info_coaching_name = $row['coaching_info_coaching_name'];
	$coaching_info_coaching_contact_no = $row['coaching_info_coaching_contact_no'];
	$coaching_info_coaching_code = $row['coaching_info_coaching_code'];
	$coaching_info_coaching_address = $row['coaching_info_coaching_address'];
	$coaching_info_coaching_city = $row['coaching_info_coaching_city'];
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

global $coaching_info_coaching_name,$coaching_info_coaching_contact_no,$coaching_info_coaching_address,$coaching_info_coaching_city,$session1,$coaching_info_logo,$student_name,$student_class,$student_roll_no,$student_date_of_birth,$student_father_contact_number,$student_photo,$student_image,$roll_no,$coaching_roll_no,$coaching_info_coaching_code,$student_gender,$path1;

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
	}elseif($y1<34){
	$coaching_info_coaching_name_2=$coaching_info_coaching_name_2.' '.$c1[$z];
	}else{
	$coaching_info_coaching_name_3=$coaching_info_coaching_name_3.' '.$c1[$z];
	}
	}


$height=0;
$height1=92;
$width=0;
$width1=69;
$horizontal=0;
$vertical=0;


$roll_no=$_POST['school_id_card_info'];	

$count=count($roll_no);
for($j=0;$j<$count;$j++){
$que1="select * from student_admission_info where student_roll_no='$roll_no[$j]' and session_value='$session1'";
$run1=mysql_query($que1);
$student_photo='';
while($row1=mysql_fetch_array($run1)){
	
	$student_name=$row1['student_name'];
	$student_father_name=$row1['student_father_name'];
	$course_code=$row1['course_code'];
	$student_admission_number=$row1['student_admission_number'];
	$student_roll_no=$row1['student_roll_no'];
	$coaching_roll_no=$row1['coaching_roll_no'];
	$student_address=$row1['student_address'];
	$student_gender=$row1['student_gender'];
	$student_date_of_birth1=$row1['student_date_of_birth'];
	if($student_date_of_birth1!=''){
	$student_date_of_birth2=explode("-",$student_date_of_birth1);
	$student_date_of_birth=$student_date_of_birth2[2]."-".$student_date_of_birth2[1]."-".$student_date_of_birth2[0];
	}else{
	$student_date_of_birth='';
	}
	$student_father_contact_number=$row1['student_father_contact_number'];
   	$student_id_generate=$row1['student_id_generate'];

}
$query22="select * from coaching_courses where coaching_info_courses_code='$course_code'";
$run22=mysql_query($query22);
while($row22=mysql_fetch_array($run22)){
$coaching_info_courses_name=$row22['coaching_info_courses_name'];
}

$que1="select * from student_documents where student_roll_no='$roll_no[$j]'";
$run1=mysql_query($que1);
  $student_photo='';
while($row1=mysql_fetch_array($run1)){
$student_photo=$row1['student_image'];
$student_image="data:image/jpeg;base64,".$student_photo;
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
  
		$this->Image('../id_card_image/id_card_background_header_1.png',10+$width,10+$height,52,13.5);
		
		if($coaching_info_logo==null){
		$this->Image('../../../images/blank_logo.png',30+$width,17+$height,9,10);
		}else{
		$this->Image($path1,30+$width,17+$height,9,10,'png');
		}
		
		if($student_photo==null){
		$this->Image('../../../images/blank.jpg',26.5+$width,35.2+$height,19.6,19.6);
		}else{
		$this->Image($student_image,26.5+$width,35.2+$height,19.6,19.6,'jpeg');
		}
		
		$this->Image('../id_card_image/id_card_background_footer_1.png',10+$width,72+$height,52,20);	

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
		$this->Cell(21,6,'Coaching Code -',0,0,'C');
		$this->Cell(10,6,'',0,0,'C');
		$this->Cell(21,6,''.$coaching_info_coaching_code,0,0,'C');
		$this->Ln();
		
		//--------------------------------------------
		
		$this->Cell(52,11.5,'',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',10);
		$this->SetTextColor(255,0,0);
		$this->Cell(7,1.5,'',0,0,'C');
		$this->Cell(38,1.5,''.$coaching_info_coaching_name_1,0,0,'C');
		$this->Ln();
		
		
		$this->SetFont('Times','B',10);
		$this->SetTextColor(255,0,0);
		$this->Cell(7,4.5,'',0,0,'C');
		$this->Cell(38,4.5,''.$coaching_info_coaching_name_2,0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,1.5,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		// image border code
		$this->SetLineWidth(0.25);
		$this->SetDrawColor(52,53,54);
		$this->Cell(16,20,'',0,0,'C');
		$this->Cell(20,20,'',1,0,'C');
		$this->Cell(18.5,15,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,6,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(52,3.5,''.strtoupper($student_name),0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		if($student_gender=='Male'){
		$this->Cell(52,3.5,'S/O '.$student_father_name,0,0,'C');
		}elseif($student_gender=='Female'){
		$this->Cell(52,3.5,'D/O '.$student_father_name,0,0,'C');
		}else{
		$this->Cell(52,3.5,''.$student_father_name,0,0,'C');
		}
		$this->Ln();
		//--------------------------------------------

	
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(17,4,'Course     ',0,0,'L');
		$this->Cell(2,4,':',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(24,4,''.$coaching_info_courses_name,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(17,4,'Student Id',0,0,'L');
		$this->Cell(2,4,':',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(24,4,''.$student_roll_no,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(17,4,'D.O.B.   ',0,0,'L');
		$this->Cell(2,4,':',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(24,4,''.$student_date_of_birth,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(9,4,'',0,0,'C');
		$this->Cell(17,4,'Mobile   ',0,0,'L');
		$this->Cell(2,4,':',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(24,4,''.$student_father_contact_number,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(24,6,'',0,0,'L');
		$this->Ln();
		//--------------------------------------------

			
		
$a1=explode(' ',$coaching_info_coaching_address);
	$a2=count($a1);
	$l=0;
	$m=0;
	$m1=0;
	$l1=0;
	$l2=0;
	$coaching_adress1= "";
	$coaching_adress2= "";
	$coaching_adress3= "";
	for($z1=0;$z1<$a2;$z1++){
	 $l=strlen($a1[$z1]);
	$m=$m+$l;
	if($m>70){
	if($l1==0){
	$m1='16';
	$l1++;
	}
	}
	if($m>150){
    if($l2==0){
	$m1='32';
	$l2++;
	}
	}
	$m1=$m1+$m;

	$m=$m1;
	if($m1<70){
	$coaching_adress1=$coaching_adress1.' '.$a1[$z1];
	}elseif($m1<150){
	$coaching_adress2=$coaching_adress2.' '.$a1[$z1];
	}else{
	$coaching_adress3=$coaching_adress3.' '.$a1[$z1];
	}
	}		
		
		
        $this->SetFont('Times','B',7);
		$this->SetTextColor(0,0,0);
		$this->Cell(20,1,'',0,0,'L');
		$this->Cell(12,1,''.$coaching_adress1,0,0,'C');
		$this->Ln();
		$this->Cell(24,1.5,'',0,0,'L');
		$this->Ln();
		
		$this->SetFont('Times','B',7);
		$this->SetTextColor(0,0,0);
		$this->Cell(19,1,'',0,0,'L');
		$this->Cell(12,1,''.$coaching_adress2,0,0,'C');
		$this->Ln();

		//--------------------------------------------
		$this->SetFont('Times','B',7);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','',7);
		$this->Cell(52,3.5,''.$coaching_adress2.' '.$coaching_info_coaching_city,0,0,'C');
		$this->Ln(-78.5);
		
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
	
	}    //---------------------------------------------------------------------------------------------------
		
	  
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
	
$file_name="id_cards_".$student_class.".pdf";
$pdf->Output('I',$file_name);
?>