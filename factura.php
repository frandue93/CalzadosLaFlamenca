<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
require_once('lib/fpdf/fpdf.php');
require_once("clases/pdf.php");

if(isset($_GET["id_pedido"]))
global $id_pedido;
$id_pedido = $_GET["id_pedido"];



$pdf = new PDF();

$pdf->SetFont('Arial','',14);

$pdf->AddPage();

$pdf->CuerpoTabla($id_pedido);

$pdf->Output();


?>