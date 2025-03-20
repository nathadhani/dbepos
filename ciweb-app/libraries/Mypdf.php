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
        // $data['profil_usaha'] = $this->Bksmdl->getprofilusaha(2);
        // $this->SetFont('helvetica', 'B', 14);
        // $this->writeHTML('<h4>' . $profil_usaha[0]->store_name . '</h4>');
        // $this->SetFont('helvetica', 'B', 12);
        // $this->writeHTML('<small>' . $profil_usaha[0]->store_address . '</small>');
        // $this->writeHTML('<small>' . $profil_usaha[0]->store_phone . '</small>');
        // $this->writeHTML('<hr>');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->writeHTML('<hr>');
        $this->Cell(0, 1, $this->customFooterText . ' print date : ' . date('d-m-Y H:i:s T') . ' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages() , 0, false, 'L', 0, '', 0, false, 'T', 'M');        
    }
}
 