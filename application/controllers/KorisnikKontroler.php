<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikKontroler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
//        
//        if(!$this->session->has_userdata('user'))  
//      
//            redirect('/Login'); 
        
    }
    
    public function index() {
        
//        if($this->session->user != null ){
//            redirect('/KorisnickiKontroler');
//        }
        
        $data['middle'] = 'middle/korisnik';
        $this->load->view('basicTemplate', $data);
    }
    
    
    //funkcija za prikazivanje 5 najskorijih festivala
    
    public function festivali(){
        
        $this->load->model('KorisnikModel');
        
        $fest = $this->KorisnikModel->prikaziFestivale();
        
        $festOd = $fest['StartDate'];
        $festDo = $fest['EndDate'];
        
        
        $data['middle'] = 'middle/korisnik';
        $data['middleData'] = ['festivali' => $fest];
        $this->load->view('basicTemplate', $data);
        
    }
}