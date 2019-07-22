<?php

//
//    if (!$this->session->has_userdata('korisnik')) {
//     
//        $this->load->view( "header/guestHeader", $headerData ?? [] );    
//    }
//    else{
//        $this->load->view( "header/userHeader", $headerData ?? [] );
//            }
//        $this->load->view( $middle, $middleData ?? [] );
//        $this->load->view( "footer/basicFooter" );

 if ( $this->session->has_userdata('korisnik')) {
        $tip=$this->session->userdata('korisnik')->Type;
        if ($tip == 'prodavac') {
             $this->load->view("header/salesHeader", $header_podaci ?? []);
        }
        else {
            $this->load->view("header/userHeader", $header_podaci ?? []);
        }     
    }
    else {
        $this->load->view("header/guestHeader", $header_podaci ?? []);
    }
    $this->load->view ( $middle, $middleData ?? [] );
    $this->load->view ( "footer/basicfooter");
    