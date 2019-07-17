<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('user')) {
            redirect('/KorisnikKontroler');
        } 
    }
    
     public function index(){
       
        $data['middle'] = 'middle/index';
        $this->load->view('basicTemplate', $data);
         
    }

    public function login() {
     
	$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
       	
        if($this->form_validation->run() == TRUE){
            
            $username = $this->input->post('username');
            $password = $this->input->post('password'); 
       
            $this->load->model('KorisnikModel');
	 
            $korisnici = $this->KorisnikModel->dohvatiKorisnika($username, $password);     
                    if(count($korisnici)== 0){
                        
                        $data = [];
                        $data['err']="Nekorektni podaci";
                        $this->load->view('Login', $data);
                    }
                    else {
                        $korisnik = $korisnici[0];
                        $this->session->set_userdata('korisnik', $korisnik);           
                        redirect("/KorisnikKontroler");
                    }                    
    }
    }
    
    
    public function logout() {
        
            $this->session->sess_destroy();            
            redirect("/Login");
    }

}
