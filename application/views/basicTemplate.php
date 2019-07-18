<?php


    if (!$this->session->has_userdata('korisnik')) {
     
        $this->load->view( "header/guestHeader", $headerData ?? [] );    
    }
    else{
        $this->load->view( "header/userHeader", $headerData ?? [] );
            }
        $this->load->view( $middle, $middleData ?? [] );
        $this->load->view( "footer/basicFooter" );
