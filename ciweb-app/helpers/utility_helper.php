<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function dayList(){
    $date = date('Y-m-d');
    $day = date('D', strtotime($date));
    $hari = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    return $hari[$day];
}

function formatUang($angka) {
    return number_format($angka, 0, ',', '.');
}

function is_multiarray($a) {
    $rv = array_filter($a, 'is_array');
    if (count($rv) > 0) {
        return true;
    }
    return false;
}

function list_of_files($path) {
    $ci = & get_instance();
    $ci->load->helper('directory');
    $map = directory_map($path);
    return $map;
}

function revDate($date, $e = '-', $i = '-') {
    if (strlen($date) > 2) {
        $x = explode($e, $date);
        $date = $x[2] . $i . $x[1] . $i . $x[0];
        return $date;
    } else {
        return NULL;
    }
}

function checkIfNotAjax() {
    $ci = & get_instance();
    if (!$ci->input->is_ajax_request()) {
        redirect(base_url('auth/'));
    }
}

function cekSelect2($args = array(), $postData) {
    foreach ($args as $val) {
        $postData[$val] = isset($postData[$val]) ? $postData[$val] : NULL;
    }
    return $postData;
}

function cekStatus($p) {
    $s = isset($p['status']) ? '1' : '0';
    return $s;
}

function cekEntry($p) {
    $s = isset($p['entry']) ? '1' : '0';
    return $s;
}

function cekApprove($p) {
    $s = isset($p['approve']) ? '1' : '0';
    return $s;
}

function cekEdit($p) {
    $s = isset($p['edit']) ? '1' : '0';
    return $s;
}

function cekReject($p) {
    $s = isset($p['reject']) ? '1' : '0';
    return $s;
}

function cekAccess($p) {
    $s = isset($p['access']) ? '1' : '0';
    return $s;
}

function cekWeb($p) {
    $s = isset($p['web']) ? '1' : '0';
    return $s;
}

function cekBulanRomawi($Bln) {
    if ($Bln == '01' ){
        $rom = "I";
    }elseif ($Bln == '02' ){
        $rom = "II";
    }elseif ($Bln == '03' ){
        $rom = "III";
    }elseif ($Bln == '04' ){
        $rom = "IV";
    }elseif ($Bln == '05' ){
        $rom = "V";
    }elseif ($Bln == '06' ){
        $rom = "VI";
    }elseif ($Bln == '07' ){
        $rom = "VII";
    }elseif ($Bln == '08' ){
        $rom = "VIII";
    }elseif ($Bln == '09' ){
        $rom = "IX";
    }elseif ($Bln == '10' ){
        $rom = "X";
    }elseif ($Bln == '11' ){
        $rom = "XI";
    }elseif ($Bln == '12' ){
        $rom = "XII";
    }
    return $rom;
}

function number_unformat($number, $force_number = true, $dec_point = ',', $thousands_sep = '.') {
    if ($force_number) {
        $number = preg_replace('/^[^\d]+/', '', $number);
    } else if (preg_match('/^[^\d]+/', $number)) {
        return false;
    }
    $type = (strpos($number, $dec_point) === false) ? 'int' : 'float';
    $number = str_replace(array($dec_point, $thousands_sep), array('.', ''), $number);
    settype($number, $type);
    return $number;
}

function tanggalIndo($date) {
    $dateArray = explode("-", $date);
    $mth = $dateArray[1];
    switch ($mth) {
        case "01": $bln = "Jan"; break;
        case "02": $bln = "Feb"; break;
        case "03":
            $bln = "Mar";
            break;
        case "04":
            $bln = "Apr";
            break;
        case "05":
            $bln = "Mei";
            break;
        case "06":
            $bln = "Jun";
            break;
        case "07":
            $bln = "Jul";
            break;
        case "08":
            $bln = "Agt";
            break;
        case "09":
            $bln = "Sep";
            break;
        case "10":
            $bln = "Okt";
            break;
        case "11":
            $bln = "Nop";
            break;
        case "12":
            $bln = "Des";
            break;
    }
    return $dateArray[0]." ".$bln." ".$dateArray[2];
}

function namabulan($bln){
    switch($bln){
        case '01': $nmbln = 'Januari'; break;            
        case '02':  $nmbln = 'Pebruari'; break;
        case '03':  $nmbln = 'Maret'; break;
        case '04':  $nmbln = 'April'; break;
        case '05':  $nmbln = 'Mei'; break;
        case '06':  $nmbln = 'Juni'; break;
        case '07':  $nmbln = 'Juli'; break;
        case '08':  $nmbln = 'Agustus'; break;
        case '09':  $nmbln = 'September'; break;
        case '10':  $nmbln = 'Oktober'; break;
        case '11':  $nmbln = 'Nopember'; break;
        case '12':  $nmbln = 'Desember'; break;
    }
    return $nmbln;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil." Rupiah";
}

Function fTEBAL() 
{
	Return ( CHR(27).CHR(71) );
}

Function fUnTEBAL() 
{
	Return( CHR(27).CHR(72) );
}

Function fNORMAL10() 
{
    Return( CHR(27).CHR(80).CHR(18) );
}

Function fNORMAL12() 
{
	Return( CHR(27).CHR(77).CHR(18) );
}

Function fCONDEN10() 
{
	Return( CHR(27).CHR(80).CHR(15) );
}
	
Function fCONDEN12() 
{
	Return( CHR(27).CHR(77).CHR(15) );
}

Function fKECIL10() 
{
	Return( CHR(27).CHR(80).CHR(15) );
}    

Function fKECIL12() 
{
	Return( CHR(27).CHR(77).CHR(15) );
}    

Function fBESAR12()
{ 
	Return( CHR(27).CHR(77).CHR(18).CHR(14) );
}    

Function fUnBESAR12() 
{
	Return( fNORMAL12() );
}

Function fBESAR10() 
{
	Return( CHR(27).CHR(80).CHR(18).CHR(14) );
}

Function fUnBESAR10()
{
	Return( fNORMAL10() );
}

Function fHiON()
{
	Return( CHR(27)."w".CHR(1) );
}    

Function fHiOFF()
{
	Return( CHR(27)."w".CHR(0) );
}

Function fWideON()
{
	Return( CHR(27)."W".CHR(1) );
}

Function fWideOFF()
{
	Return( CHR(27)."W".CHR(0) );
}

Function fItalicON()
{
	Return( CHR(27)."4" );
}

Function fItalicOFF()
{
	Return( CHR(27)."5" );
}

Function fUnderON()
{
	Return( CHR(27)."-".CHR(1) );
}

Function fUnderOFF()
{
	Return( CHR(27)."-".CHR(0) );
}   