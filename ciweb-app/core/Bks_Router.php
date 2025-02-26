<?php

(defined( 'BASEPATH' )) OR exit( 'No direct script access allowed' );

/* load the MX_Router class */
require APPPATH . "third_party/MX/Router.php";

class Bks_Router extends MX_Router {

    public function __construct() {
        parent::__construct();
    }

    public function _set_request( $segments = array() ) {
        for ( $i = 0; $i < 3; ++$i ) {
            if ( isset( $segments[$i] ) ) {
                $segments[$i] = str_replace( '-', '_', $segments[$i] );
            }
        }
        parent::_set_request( $segments );
    }

}
