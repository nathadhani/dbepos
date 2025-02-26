<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
 
class Mypdf extends TCPDF
{
    private $customFooterText = "";
    public $Bksmdl = null;

    function __construct()
    {
        parent::__construct();
    }

    public function setCustomFooterText($customFooterText)
    {
        $this->customFooterText = $customFooterText;
    }

    //Page header
    public function Header() {
        // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Title
        // $Bksmdl = new Bksmdl;
        // $data['profilusaha'] = $this->Bksmdl->getprofileusaha(2, null);
        // $this->SetFont('helvetica', 'B', 14);
        // $this->writeHTML('<h4>' . $profilusaha[0]->company_name . '</h4>');
        // $this->SetFont('helvetica', 'B', 12);
        // $this->writeHTML('<small>' . $profilusaha[0]->company_address . '</small>');
        // $this->writeHTML('<small>' . $profilusaha[0]->company_phone . '</small>');
        // $this->writeHTML('<hr>');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        // $this->writeHTML('<hr>');
        // $this->Cell(0, 1, $this->customFooterText . 'Di cetak menggunakan aplikasi Epos Currency Exchange pada tanggal ' . date('d-m-Y H:i:s T') . '                                                                                         Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages() , 0, false, 'L', 0, '', 0, false, 'T', 'M');        
    }
}
 