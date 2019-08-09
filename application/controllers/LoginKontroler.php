<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginKontroler extends CI_Controller{
        
    public function __construct() {
        
        parent::__construct();
         
        if($this->session->has_userdata('korisnik')){
            $tip=$this->session->userdata('korisnik')->Type;

            if ($tip=='prodavac') {
                redirect ('ProdavacKontroler');

            }       
            else {
                redirect ('KorisnikKontroler');
            }
        }
        
         $this->load->model('LoginModel');
    }
    
    public function index(){
      
         $data['middle']='middle/index';
         $this->load->view('basicTemplate', $data);
               
    }

public function login(){

   if(isset($_POST["Login"])){
        
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      
      $postoji=$this->LoginModel->login($username, $password);

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!HASH ukljuci prilikom spajanja sa registracijom  
//      if (isset($postoji))
//        {
//            //Using hashed password - PASSWORD_BCRYPT method - from database
//            $hash = $row->password;

//            if (password_verify($password, $hash)) {

            if($postoji){    

                $this->session->set_userdata('korisnik',$this->LoginModel->dohvatiUsera($username));

                $tip=$this->session->userdata('korisnik')->Type;

                if ($tip=='prodavac') {
                    redirect ('ProdavacKontroler');

                }       
                else {
                    $this->session->set_userdata('korisnik',$this->LoginModel->dohvatiUsera($username));
                    redirect ('KorisnikKontroler');
                }
              // $this->session->set_userdata('korisnici',$this->KorisnikModel->dohvatiSveUsere( $username));
        
            }
            else {    

                $data["middle"]="middle/index";
                $data["footer_podaci"]=['porukalogin'=>'Neispravni podaci'];
                $data["header_podaci"]=['porukalogin'=>'Neispravni podaci'];
                $this->load->view('basicTemplate', $data);            
            }
   }
       
}
     
}
  

