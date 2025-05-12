<?php
//pdf e qrcode: utilizzare una libreria esterna php

//composer require tecnickcom/tcpdf
require('vendor/tecnickcom/tcpdf/tcpdf.php');
$name = '5E';
$lastname = 'ViolaMarchesini';

$pdf = new TCPDF();
$pdf->AddPage(); //aggiungere una pagina
$pdf->SetFillColor(179,179,179);
$pdf->Rect(0,0,280,297, "F");
$pdf->Cell(0,10,'Ciao questo è il tuo ticket: ', 1, 1, "C");
$pdf->Ln(10);//10 righe tra l'uno e l'altro
$pdf->setFont('helvetica', 'B', 16);
$pdf->SetTextColor(235, 79, 52);
$pdf->Cell(0, 10, "Nome: {$name}", 0, 1, 'L');
$pdf->Cell(0, 10, "Cognome: {$lastname}", 0, 1, 'L');
$pdf->Cell(0,10, "Data e ora evento:".date("d/m/y H:i"), 0,1,"R");
$pdf->write2DBarcode("Ciao {$name} {$lastname} - Uffizzi Firenze, data: ".date("d/m/y H:i"), 'QRCODE,L', 10, 80, 50, 50, [], 'N');
$pdf->Image('logo.jpg', $pdf->getPageWidth()-80,$pdf->getPageHeight()-100, 60, 60);
$pdf->Output('Ticket.pdf', 'I');
