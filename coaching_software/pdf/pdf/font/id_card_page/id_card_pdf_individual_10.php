
<?php

include("../../../connection/connect.php");
$que="select * from  school_info_general";
$run=mysql_query($que);
while($row=mysql_fetch_array($run)){

	$school_info_school_name = $row['school_info_school_name'];
	$school_info_school_contact_no = $row['school_info_school_contact_no'];
	$school_info_school_code = $row['school_info_school_code'];
	$school_info_logo = $row['school_info_logo'];
	
	
	
	
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

global $school_info_school_name,$school_info_school_contact_no,$school_info_logo,$student_name,$student_class,$student_roll_no,$student_date_of_birth,$student_father_contact_number,$student_photo,$student_image,$roll_no,$school_roll_no,$school_info_school_code;

$logo_image='../../../documents/school_info/'.$school_info_logo;

    $school_info_school_name=strtoupper($school_info_school_name);
    $school_info_school_name_1= substr($school_info_school_name,0,17);
	$school_info_school_name_2= substr($school_info_school_name,17,34);

$height=0;
$height1=92;
$width=0;
$width1=69;
$horizontal=0;
$vertical=0;


$roll_no=$_GET['school_id_card_info'];


$que1="select * from student_admission_info where student_roll_no='$roll_no'";
$run1=mysql_query($que1);
while($row1=mysql_fetch_array($run1)){
   
	$student_name=$row1['student_name'];
	$student_class=$row1['student_class'];
	$student_roll_no=$row1['student_roll_no'];
	$school_roll_no=$row1['school_roll_no'];
	$student_date_of_birth1=$row1['student_date_of_birth'];
	$student_date_of_birth2=explode("-",$student_date_of_birth1);
	$student_date_of_birth=$student_date_of_birth2[2]."-".$student_date_of_birth2[1]."-".$student_date_of_birth2[0];
	$student_father_contact_number=$row1['student_father_contact_number'];
    $student_photo=$row1['student_photo'];
	$student_id_generate=$row1['student_id_generate'];
	
		
	$student_image='../../../documents/student/'.$student_id_generate.'/'.$student_photo;
	
	
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
  
  
		$this->Image('../id_card_image/id_card_full_background_5.png',10+$width,10+$height,52,82);
		
		
		$this->Image('../id_card_image/id_card_background_header_5.png',10+$width,10+$height,52,16.5);
		
		if($school_info_logo==null){
		$this->Image('../../../documents/school_info/blank_logo.png',11+$width,22+$height,11,12);
		}
		else{
		$this->Image($logo_image,11+$width,22+$height,11,12);
		}
		
		if($student_photo==null){
		$this->Image('../../../documents/student/blank.jpg',28.7+$width,37.2+$height,14.6,14.6);
		}
		else{
		$this->Image($student_image,28.7+$width,37.2+$height,14.6,14.6);
		}
		
		$this->Image('../id_card_image/id_card_background_footer_5.png',10+$width,76+$height,52,16);	

if($horizontal>0)
  {
  $this->Ln(-92);
$this->SetLeftMargin(10+$width);  
  }
  

        $this->SetLeftMargin(10+$width);
        $this->SetFont('Times','B',8.5);
		$this->SetTextColor(255,255,255);
		$this->Cell(17,0,'',0,0,'C');
		$this->Ln();
		$this->Cell(21,5,'School Code -',0,0,'C');
		$this->Cell(10,5,'',0,0,'C');
		$this->Cell(21,5,''.$school_info_school_code,0,0,'C');
		$this->Ln();
		
		//--------------------------------------------
		
		$this->Cell(52,8,'',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',10);
		$this->SetTextColor(79,4,128);
		$this->Cell(14,5,'',0,0,'C');
		$this->Cell(38,5,''.$school_info_school_name_1,0,0,'C');
		$this->Ln();
		
		$this->SetFont('Times','B',10);
		$this->SetTextColor(79,4,128);
		$this->Cell(14,5,'',0,0,'C');
		$this->Cell(38,5,''.$school_info_school_name_2,0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,4,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		// image border code
		$this->SetLineWidth(0.25);
		$this->SetDrawColor(52,53,54);
		$this->Cell(18.5,15,'',0,0,'C');
		$this->Cell(15,15,'',1,0,'C');
		$this->Cell(18.5,15,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,1,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		
		$this->SetFont('Times','B',9);
		$this->SetTextColor(79,4,128);
		$this->Cell(52,5,''.$student_name,0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(52,2,'',0,0,'C');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Class     ',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$student_class,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Roll No.',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$school_roll_no,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'D.O.B.   ',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$student_date_of_birth,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',9);
		$this->SetTextColor(55,3,89);
		$this->Cell(11,5,'',0,0,'C');
		$this->Cell(13,5,'Mobile   ',0,0,'L');
		$this->Cell(2,5,'-',0,0,'C');
		$this->SetFont('Times','',9);
		$this->Cell(26,5,''.$student_father_contact_number,0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->Cell(26,7,'',0,0,'L');
		$this->Ln();
		//--------------------------------------------
		$this->SetFont('Times','B',8);
		$this->SetTextColor(255,255,255);
		$this->Cell(32,5,'School Contact No.  - ',0,0,'R');
		$this->SetFont('Times','',8);
		$this->Cell(20,5,''.$school_info_school_contact_no,0,0,'L');
		$this->Ln(-77);
		
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
$pdf->Output('D',$file_name);
?>