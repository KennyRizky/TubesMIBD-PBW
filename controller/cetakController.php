<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Enrollment.php";
require_once "fpdf/fpdf.php";

class cetakController extends FPDF{
    protected $db;

    public function __construct($orientiation='P', $unit ='pt', $format = 'Letter', $margin = 40){
        $this->db = new MySQLDB("localhost","root","","online_course");
        $this->FPDF($orientiation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
    }

    public function view_cetak(){
        return View::createView(
    }

    function Header(){
        $this->SetFont('Arial', 'B', 20);
        $this->SetFillColor(36, 96, 84);
        $this->SetFillColor(225);
        $this->Cell(0, 30, "Study Hub", 0, 1,'C', true);
    }

    function Footer(){
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0));
        $this->SetXY(40, -60);
        $this->Cell(0, 20, "Thank You", 'T', 0,'C');
    }

    $pdf = new cetakController();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetY(100);

    $pdf->Cell(100, 13, "Ordered By");
    $pdf->SetFont('Arial', '');

    $pdf->Cell(100, 13, "kenny");

    $pdf->SetFont('Arial', 'B');
    $pdf->Cell(50, 13, "ganteng");
    $pdf->SetFont('Arial', '');
    $pdf->Cell(100, 13, date('F j, Y'), 0, 1);

    $pdf->SetFont('Arial', 'I');
    $pdf->SetX(140);
    $pdf->Cell(200, 15, "PondokHijau", 0, 2);
    $pdf->Cell(200, 15, "Bandung", 0, 2);
    $pdf->Cell(200, 15, "Indonesia", 0, 2);

    $pdf->Output('css/uploads/laporan.pdf', 'F');


}