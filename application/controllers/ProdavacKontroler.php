<?php


class ProdavacKontroler extends CI_Controller {

public function index(){
       
        $data['middle']='middle/prodavac';
        $this->load->view('basicTemplate', $data);
         
   
}

    
 public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

}