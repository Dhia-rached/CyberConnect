<?php
require('fpdf/fpdf.php');
include('../controler/produitC.php');

$ProduitCtrl = new produitC();
$data = $ProduitCtrl->afficher_produit();
$db = config::getConnexion();
$reqLiv = $db->query("SElECT * From produit order by nom ");

foreach ($data as $produit) {
    $idProduit = $produit['code'];
    $nomProduit = $produit['nom'];
    $prixProduit = $produit['prix'];
    $quantiteProduit = $produit['qualite'];
    $stockProduit = $produit['stock'];
    $stockProduit = $produit['img'];
    $stockProduit = $produit['id'];


    $title1 = 'Liste des Produits';


    $pdf = new FPDF();
    $pdf->AddPage();
      // $pdf->Image("../assets//img/lg.jpg", 10, 2, 25, 20);
    $pdf->Ln(10);
    $pdf->Ln(2);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);


    $pdf->setTitle($title1);
    // Arial bold 15
    $pdf->SetFont('Arial', 'B', 10);
    $w = $pdf->GetStringWidth($title1) + 6;
    $pdf->SetX((210 - $w) / 2);
    //Color of frame, bg and text
    $pdf->SetDrawColor(176, 140, 55, 1);
    $pdf->SetFillColor(176, 140, 55, 1);
    $pdf->SetTextColor(255, 255, 255, 1);
    //tickness of frame (1mn)
    $pdf->SetLineWidth(1);
    $pdf->Cell($w, 9, $title1, 1, 1, 'C', true);


    //Line break
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);


    $pdf->SetTextColor(0, 0, 0, 1);
    $w = $pdf->GetStringWidth($nomProduit) + 105.1;

    $pdf->SetX((140 - $w) / 2);
    $pdf->Cell(32, 10, 'code', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Nom Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Prix Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Qualité Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'STOCK', 1, 0, 'C');
    $pdf->Cell(32, 10, 'categorie du Produit', 1, 0, 'C');


    $pdf->Ln(10);
    while ($row = $reqLiv->fetch()) {
        $pdf->Cell(32, 10, $row['code'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['nom'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['prix'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['qualite'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['stock'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['id'], 1, 0, 'C');
        $pdf->Ln(10);
    }





    $pdf->Output();
}