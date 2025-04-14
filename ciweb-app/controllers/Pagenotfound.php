<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagenotfound extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('pagenotfound_v'); //loading view
    }

}
