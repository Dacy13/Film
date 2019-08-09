<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class GostKontroler extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        
        $this->load->model('GostModel');
        
    }
    
    public function index(){
       
        $festivali=$this->dohvatiSveFestivale();
        $data['middle']='middle/index';
        $data["middle_podaci"]=['festivali'=>$festivali];
        $this->load->view('basicTemplate', $data);
    }

    
    public function dohvatiSveFestivale(){
    
        if(!empty($this->input->post("Pretrazi"))){ 
      
            $imeFestivala=$this->input->post('imeFestivala');

            $datumOd=$this->input->post('datumOd');

        if(!empty($datumOd))
            
            $datumOd = date("Y-m-d", strtotime($datumOd));

            $datumDo=$this->input->post('datumDo');
        
        if(!empty($datumDo))
            
            $datumDo = date("Y-m-d", strtotime($datumDo));

            $festivali=$this->GostModel->dohvatiSveFestivale($imeFestivala, $datumOd, $datumDo);

        return $festivali;
     }
   }

}
