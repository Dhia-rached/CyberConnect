<?php
require('fpdf/fpdf.php');
include('../../../Controller/ProduitController.php');

$ProduitCtrl = new ProduitController();
$data = $ProduitCtrl->findAll();
$db = config::getConnexion();
$reqLiv = $db->query("SElECT * From Produit INNER JOIN categories ON Produit.idCat = categories.idCategorie order by nomProduit ");

foreach ($data as $produit) {
    $idProduit = $produit['idProduit'];
    $nomProduit = $produit['nomProduit'];
    $prixProduit = $produit['prix'];
    $quantiteProduit = $produit['quantite'];
    $categorieProduit = $produit['nomCategorie'];


    $title1 = 'Liste des Produits';


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image("../../../assets/client/img/core-img/logo3.png", 10, 2, 25, 20);

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
    $pdf->Cell(32, 10, 'Id Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Nom Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Prix Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'Quantite Produit', 1, 0, 'C');
    $pdf->Cell(32, 10, 'categorie du Produit', 1, 0, 'C');


    $pdf->Ln(10);
    while ($row = $reqLiv->fetch()) {
        $pdf->Cell(32, 10, $row['idProduit'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['nomProduit'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['prix'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['quantite'], 1, 0, 'C');
        $pdf->Cell(32, 10, $row['nomCategorie'], 1, 0, 'C');
        $pdf->Ln(10);
    }





    $pdf->Output();
}