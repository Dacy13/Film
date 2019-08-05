<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FestivalKontroler extends CI_Controller {
    
    public function __construct () {
        parent::__construct();
        
        $this->load->model("FestivalModel");
    }
    
    public function index() {
        //$IdFest=1;
        //$IdFest=$this->input->get('FestivalKonroler/index?id');
        //$IdFest=site_url('FestivalKontroler/index')."?id=".$search_show->IdFest;
        $IdFest=$this->input->get('id', TRUE);// OVO JE VAZNO; sa ovim je bilo OZBILjNOG SNOSAJA

        //$IdProjekcija=$this->db->get();
        $festival=$this->FestivalModel->dohvatiFestival($IdFest);
        //$projekcija=$this->FestivalModel->prikaziProjekciju($IdProjekcija,$IdFest);
        $projekcije=$this->FestivalModel->prikaziProjekciju($IdFest);
        
        $data["middle"]= "middle/festival";
        $data['middle_podaci']= ['festival'=>$festival,'projekcije'=>$projekcije];
        $this->load->view("basicTemplate", $data); 
    }


    public function dohvatiSveFestivale() {
       
        $svifestivali=$this->FestivalModel->dohvatiSveFestivale();
        
    }
    
    public function dohvatiFestival($IdFest) {
        
       $festival=$this->FestivalModel->dohvatiFestival();
        
    }
    
    public function prikaziProjekciju() {
        $projekcija=$this->FestivalModel->prikaziProjekciju();
    }
}
