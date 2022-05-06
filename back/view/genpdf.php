<?php
use Dompdf\Dompdf;
use Dompdf\Options;

include_once "../config.php"
$sql='SELECT*FROM `users`';
$query=$db->query($sq1); 
$users=$query->fetchAll(); 
var_dump($users); die;

include_once "../includes/dompdf/autoload.inc.php";
$options=new Options();
$options->set('defaultFont', 'Courier');
$dompdf=new Dompdf();
$dompdf->loadHtml('Brouette');
$dompdf->render();
$dompdf->setPaper('A4', 'portrait');
$fichier  'mon-pdf.pdf';

$dompdf->stream($fichier);