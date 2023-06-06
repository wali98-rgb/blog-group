<?php
    require('../../../../report-pdf/fpdf.php');
    include "../../../../connection/connection.php";

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Times', 'B', 13);
    $pdf-> Cell(200, 10, 'ARTICLE DATE', 0, 0, 'C');

    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'NO',1,0,'C');
    $pdf->Cell(50,7,'TTITLE ARTICLE' ,1,0,'C');
    $pdf->Cell(75,7,'CATEGORY ARTICLE',1,0,'C');
    $pdf->Cell(55,7,'TOTAL REVIEW',1,0,'C');
    
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($con,"SELECT
        articles.id_article, articles.title_article, articles.review_article, articles.id_category,
        categories.id_category, categories.name_category
        FROM articles, categories
        WHERE articles.id_category=categories.id_category
        ORDER BY articles.title_article ASC
    ");
    while($d = mysqli_fetch_array($data)){
        $pdf->Cell(10,6, $no++,1,0,'C');
        $pdf->Cell(50,6, $d['title_article'],1,0,'C');
        $pdf->Cell(75,6, $d['name_category'],1,0,'C');  
        $pdf->Cell(55,6, $d['review_article'],1,1,'C');
    }
    
    $pdf->Output();
?>