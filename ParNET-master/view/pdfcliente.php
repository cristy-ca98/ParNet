<?php

if(!empty($_POST['submit']))
{
    $f_name = $_POST['nombre_producto'];
    $f_cantidad= $_POST['cantidad'];
    $f_empresa = $_POST['empresa'];
    $f_contacto=$_POST['contacto'];


    require ("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->SetFillColor(230,230,230);
    $pdf->Cell(0,10,"FACTURA PRODUCTO",1,1,"C");

    $pdf->Cell(50,10,"NOMBRE",1,2);
    $pdf->Cell(50,10,$f_name,1,2);


    $pdf->Cell(50,10,"CANTIDAD",1,3);
    $pdf->Cell(50,10,$f_cantidad,1,3);


    $pdf->Cell(50,10,"EMPRESA",1,4);
    $pdf->Cell(50,10,$f_empresa,1,4);

    $pdf->Cell(50,10,"CONTACTO",1,5);
    $pdf->Cell(50,10,$f_contacto,1,5);
    $pdf->Output();
}
    

?>