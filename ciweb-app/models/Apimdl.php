<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Apimdl extends Api_Model {

    function __construct() {
        parent::__construct();
    }

    public function exportJSONtofile($filename, $response){
        $dir_root = $_SERVER['DOCUMENT_ROOT'];
        $path_logs = $dir_root.'/logs/';
        $file = $path_logs . ($filename == null ? uniqid(rand(), true) : $filename ) . '.json';
        file_put_contents($file, $response);
    }
    
    public function callcurl($url, $data, $token){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_PROXY, $proxy); // $proxy is ip of proxy server
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // menyelesaikan koneksi dalam 10 detik
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // menyelesaikan koneksi dalam 10 detik

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // post data json request

        /* Define content type */
        $authorization = "Authorization:".$token; // Prepare the authorisation token
        if(isset($token) && $token !== null){
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization )); // Inject the token into the header
            curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        }

        $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
        $result = curl_exec($ch);

        /* cek status enabled or not enabled */
        // echo (is_callable('curl_init')) ? '<h1>Enabled</h1>' . (is_callable('curl_init')) : '<h1>Not enabled</h1>' . (is_callable('curl_init'));        

        if ($result === false) 
            $result = curl_error($ch);

        // $resArr = json_decode($result,true);
        // echo "<pre>"; print_r($resArr); echo "</pre>";exit;    

        curl_close($ch);
        return $result;
    }    
               
}
