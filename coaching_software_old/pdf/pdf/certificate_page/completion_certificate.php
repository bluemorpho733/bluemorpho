<?php include("../../../admin/attachment/session.php");

$completion_student_roll_no=$_GET['id'];
$query="select * from completion_certificate where s_no='$completion_student_roll_no'";
$run=mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_array($run)){
$completion_student_name = $row['completion_student_name'];
$completion_student_father_name = $row['completion_student_father_name'];
$completion_coaching_name = $row['completion_coaching_name'];
$completion_current_year_from = $row['completion_current_year_from'];
$completion_current_year_to = $row['completion_current_year_to'];
$completion_type = $row['completion_type'];
$completion_issue_date = $row['completion_issue_date'];
$completion_student_roll_no = $row['completion_student_roll_no'];

}
 
$query1="select * from coaching_info_general";
        $run1=mysql_query($query1) or die(mysql_error());
        while($row=mysql_fetch_array($run1)){
        $coaching_info_coaching_name = $row['coaching_info_coaching_name'];
}

$query121="select * from coaching_document";
$run121=mysql_query($query121) or die(mysql_error());
while($row121=mysql_fetch_array($run121)){
 	$coaching_info_principal_seal=$row121['coaching_info_principal_seal'];
	$coaching_info_principal_signature=$row121['coaching_info_principal_signature'];
	$coaching_info_logo=$row121['coaching_info_logo'];
	$path1="data:image/jpeg;base64,".$coaching_info_logo;
}  

require('../fpdf1.php');

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
     // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(25);
	  $this->SetTextColor(255,0,0);
    // Title
$this->Ln();
	 $this->SetFont('Arial','B',10);

    // Line break
    $this->Ln();
}

// Page footer
function Footer()
{
   
}
function Table1()
{

global $completion_student_name,$completion_student_father_name,$completion_coaching_name,$completion_current_year_from,$completion_current_year_to,$completion_type,$completion_issue_date,$completion_student_roll_no,$coaching_info_coaching_name,$coaching_info_logo,$path1;
    
    $this->Image('completion_certificate.jpg',1,1,295,208);
	$this->SetXY(10,25);
    $this->SetFont('Times','B',28);
	$this->SetTextColor(255,128,0);
    $this->Cell(277,6,''.strtoupper($coaching_info_coaching_name),0,0,'C');
    $this->Ln(); 
   
	$this->SetXY(119,65);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(152,6,$completion_student_name,0,0,'C');
    $this->Ln(); 
	
	$this->SetXY(137,78);
	
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(137,6,$completion_student_father_name,0,0,'C');
    $this->Ln(); 
  
	$this->SetXY(111,92);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(159,6,$completion_coaching_name,0,0,'C');
    $this->Ln(); 
  
	$this->SetXY(115,106);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(80,6,$completion_current_year_from,0,0,'C');
    $this->Ln();

    $this->SetXY(210,106);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(60,6,$completion_current_year_to,0,0,'C');
    $this->Ln();

    $this->SetXY(175,119.5);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(95,6,$completion_type,0,0,'C');
    $this->Ln();

    $this->SetXY(230,141);
    $this->SetFont('Times','B',19);
	$this->SetTextColor(76,0,153);
    $this->Cell(40,6,$completion_issue_date,0,0,'C');
    $this->Ln();

	if($coaching_info_logo==null){
	$this->Image('../../../images/blank_logo.png',20,35,25,25);
	}else{
	$this->Image($path1,20,35,25,25,'jpeg');
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
  

 

	   
	//  $pdf->SetLeftMargin(30);
		$pdf->Table1();
		$pdf->Ln(0);
		
		
		
		
	//	$pdf->SetLeftMargin(-30);

	
$file_name="Completion_certificate_".$completion_student_name.".pdf";
$pdf->Output('I',$file_name);
?>