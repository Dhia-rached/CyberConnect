<?php
include_once '../config.php';
include '../view/fpdf.php';
$db = config::getConnexion();
//require('../fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
 
$pdf->SetFont('Arial','B',12);	
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='database_name' AND `TABLE_NAME`='tab_evenement'";
$query1 = $db -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(39,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT * from  tab_evenement";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) {
$pdf->SetFont('Arial','',7);	
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(39,7,$column,1);
} }
$pdf->Output();
?>
