<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GostKontroler
 *
 * @author Danijela
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class GostKontroler extends CI_Controller {
   
    public function index(){
  
     $this->load->model('GostModel');
        
     $imeFestivala=$this->input->post('imeFestivala');
     
     $datumOd1=$this->input->post('datumOd');
     $datumOd = date("Y-m-d", strtotime($datumOd1));

     $datumDo1=$this->input->post('datumDo');
     $datumDo = date("Y-m-d", strtotime($datumDo1));
     
     $festivali=$this->GostModel->dohvatiSveFestivale($imeFestivala, $datumOd, $datumDo);
    
    
     $data['middle'] = 'middle/index';
     $data['middle_podaci']=['festivali'=>$festivali];
     $this->load->view('basicTemplate', $data);
        
        
    }
}
