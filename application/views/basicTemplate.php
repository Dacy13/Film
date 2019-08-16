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
             $this->load->view("header/prodavacHeader", $header_podaci ?? []);
        }
        elseif ($tip == 'admin') {
            $this->load->view("header/adminHeader", $header_podaci ?? []);
        }     
        else {
             $this->load->view("header/korisnikHeader", $header_podaci ?? []);
        }
    }
    else {
        $this->load->view("header/gostHeader", $header_podaci ?? []);
    }
    
    $this->load->view ( $middle, $middle_podaci ?? [] );
    $this->load->view ( "footer/basicfooter");
    