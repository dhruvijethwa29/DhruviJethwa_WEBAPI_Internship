<?php
require('fpdf.php');

$conn = new mysqli("localhost","root","","pdfdemo");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$result = $conn->query("SELECT * FROM receipt ORDER BY amt DESC");

$pdf = new FPDF('L','mm','A4'); // Landscape
$pdf->AddPage();
$pdf->SetMargins(5,5,5);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Student Payment Records',0,1,'C');
$pdf->Ln(2);

// Header
$pdf->SetFont('Arial','B',9);

$pdf->Cell(22,10,'Receipt No',1,0,'C');
$pdf->Cell(25,10,'Date',1,0,'C');
$pdf->Cell(35,10,'Student ID',1,0,'C');
$pdf->Cell(50,10,'Student Name',1,0,'C');
$pdf->Cell(20,10,'Code',1,0,'C');
$pdf->Cell(100,10,'Course Name',1,0,'C');
$pdf->Cell(20,10,'Amount',1,1,'C');

// Data
$pdf->SetFont('Arial','',8);

while($row = $result->fetch_assoc())
{
    if($pdf->GetY() > 185)
    {
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(22,10,'Receipt No',1,0,'C');
        $pdf->Cell(25,10,'Date',1,0,'C');
        $pdf->Cell(35,10,'Student ID',1,0,'C');
        $pdf->Cell(50,10,'Student Name',1,0,'C');
        $pdf->Cell(20,10,'Code',1,0,'C');
        $pdf->Cell(100,10,'Course Name',1,0,'C');
        $pdf->Cell(20,10,'Amount',1,1,'C');

        $pdf->SetFont('Arial','',8);
    }

    $pdf->Cell(22,9,$row['rno'],1);
    $pdf->Cell(25,9,$row['rdate'],1);
    $pdf->Cell(35,9,$row['stud_id'],1);
    $pdf->Cell(50,9,$row['stud_nm'],1);
    $pdf->Cell(20,9,$row['ccode'],1);
    $pdf->Cell(100,9,$row['cname'],1);
    $pdf->Cell(20,9,$row['amt'],1,1,'R');
}

$pdf->Output();
exit;
?>
