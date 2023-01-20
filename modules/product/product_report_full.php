<?php
    //SESSION START AND LOGIN CHECK
    session_start();
    require '../login/login_check.php';
    //SET ACTION AND REQUIRE CONTROLLER
    $action = 'recover';
    require 'product_controller.php';
    //FPDF REPORT DEPENDENCY
    include '../../fpdf/fpdf.php';

    //HEADER
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->Image('../../assets/logo.png', 10, 10, -500);
    $pdf->Ln(5);
    $pdf->Cell(190,10,utf8_decode('Estoque de Produtos'),0,0,"C");
    $pdf->Ln(15);
    //BODY
    $pdf->SetFont("Arial","I",6);
    $pdf->Cell(40,7,"Produto",1,0,"C");
    $pdf->Cell(40,7,"Modelo",1,0,"C");
    $pdf->Cell(10,7,"QTDE",1,0,"C");
    $pdf->Cell(30,7,"Serial",1,0,"C");
    $pdf->Cell(15,7,utf8_decode("Patrimônio"),1,0,"C");
    $pdf->Cell(20,7,"Finalidade",1,0,"C");
    $pdf->Cell(40,7,"Empresa",1,0,"C");    
    $pdf->Ln();
    //PRODUCTS LIST
    foreach ($products as $index => $product) {
        $pdf->Cell(40,7,utf8_decode($product->product),1,0,"C");
        $pdf->Cell(40,7,  utf8_decode($product->model),1,0,"C");
        $pdf->Cell(10,7,utf8_decode($product->amount),1,0,"C");
        $pdf->Cell(30,7,  utf8_decode($product->snumber),1,0,"C");
        $pdf->Cell(15,7,  utf8_decode($product->anumber),1,0,"C");
        $pdf->Cell(20,7,  utf8_decode($product->function),1,0,"C");
        $pdf->Cell(40,7,  utf8_decode($product->company),1,0,"C");
        $pdf->Ln();
    }
    $pdf->SetFont("Arial","I",8);
    $pdf->Cell(190,10,utf8_decode('Relatório gerado em'),0,0,"C");
    $pdf->Ln(4);
    $pdf->Cell(190,10,utf8_decode($today = date("d.m.y")),0,0,"C");
    $pdf->Output();

?>
