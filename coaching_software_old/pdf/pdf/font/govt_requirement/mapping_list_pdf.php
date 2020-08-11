
<?php
include("../../../connection/connect.php");
$query1="select * from school_info_general";
        $run1=mysql_query($query1) or die(mysql_error());
        while($row=mysql_fetch_array($run1)){
        $school_info_school_name = $row['school_info_school_name'];
        $school_info_school_district = $row['school_info_school_district'];
	    $school_info_school_name = strtoupper($school_info_school_name);
		$school_info_school_district = strtoupper($school_info_school_district);
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
    // Times 12
    $this->SetFont('Times','',12);
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

global $school_info_school_name,$school_info_school_district,$school_info_logo;
 $logo_image='../../../documents/school_info/'.$school_info_logo;
  
  $class_name=$_GET['class'];
  $section_name=$_GET['section'];
	
		  if($school_info_logo==null){
		$this->Image('../../../documents/school_info/blank_logo.png',15,13,16,17);
		}
		else{
		$this->Image($logo_image,15,13,16,17);
		}
         $this->Cell(190,3,"",0);
         $this->Ln();
		 
         $this->SetFont('Times','B',17);
		 $this->SetTextColor(180,0,0);
		 $this->Cell(35,7,"",0,0,'C');
		 $this->Cell(120,7,"".$school_info_school_name,0,0,'C');
		 $this->Ln();

         $this->Cell(190,2,"",0);
         $this->Ln();
		 
		 $this->SetFont('Times','B',14);
		 $this->SetTextColor(180,0,0);
		 $this->Cell(190,6,"DIST. - ".$school_info_school_district,0,0,'C');
		 $this->Ln();
		 
         $this->Cell(190,4,"",0);
         $this->Ln();
		 
		 $this->SetFont('Times','B',11);
		 $this->SetTextColor(0,0,0);
		 $this->Cell(60,7,"CLASS",0,0,'R');
		 $this->Cell(10,7,"-",0,0,'C');
		 $this->SetFont('Times','B',11);
		 $this->SetTextColor(128,0,128);
		 $this->Cell(35,7,"".strtoupper($class_name),0,0,'L');
		 $this->SetFont('Times','B',11);
		 $this->SetTextColor(0,0,0);
		 $this->Cell(25,7,"SECTION",0,0,'R');
		 $this->Cell(10,7,"-",0,0,'C');
		 $this->SetFont('Times','B',11);
		 $this->SetTextColor(128,0,128);
		 $this->Cell(25,7,"".strtoupper($section_name),0,0,'L');
		 $this->Ln();
		 
		 $this->Cell(190,3,"",0);
         $this->Ln();
		 
		 $this->SetFont('Times','B',11);
		 $this->SetTextColor(200,0,0);
		 $this->Cell(70,10,"STUDENT NAME",1,0,'C');
		 $this->Cell(70,10,"FATHER'S NAME",1,0,'C');
		 $this->Cell(25,10,"CHILD ID",1,0,'C');
		 $this->Cell(25,10,"SSSMID",1,0,'C');
		 $this->Ln();
}

// Page footer
function Footer()
{
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(0.75);
    $this->SetXY(10,10);
    $this->Cell(190,266,"",1);
    $this->Ln();

 
}


function Table1()
{
 global $student_name,$student_child_id,$student_roll_no,$student_father_name,$student_sssmid_number;
 
         
 
 
    
	
	$class_name=$_GET['class'];
	$section_name=$_GET['section'];
	if($class_name=='all'){
	$condition="";
	}elseif($section_name=='all'){
	$condition="where student_class='$class_name'";
	}else{
	$condition="where student_class='$class_name' and student_class_section='$section_name'" ;
	}
	
    $query2="select * from student_admission_info $condition";
        $run2=mysql_query($query2) or die(mysql_error());
        while($row2=mysql_fetch_array($run2)){
        $student_roll_no=$row2['student_roll_no'];
		$student_name=$row2['student_name'];
		$student_father_name=$row2['student_father_name'];
		$student_child_id=$row2['student_child_id'];
		$student_sssmid_number=$row2['student_sssmid_number'];
		


    $this->SetFont('Times','',11);
	$this->SetTextColor(0,0,128);
    $this->Cell(70,7,"".$student_name,1,0,'C');
    $this->Cell(70,7,"".$student_father_name,1,0,'C');
    $this->Cell(25,7,"".$student_child_id,1,0,'C');
    $this->Cell(25,7,"".$student_sssmid_number,1,0,'C');
    $this->Ln();
	
	
  }

	
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
		$pdf->Table1();
		
		
	//	$pdf->SetLeftMargin(-30);

$class_name=$_GET['class'];
$section_name=$_GET['section'];
$file_name="student_mapping_".$class_name."_".$section_name.".pdf";
$pdf->Output('D',$file_name);
?>