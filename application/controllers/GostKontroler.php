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
    

            $imeFestivala=$this->input->post('imeFestivala');

            $datumOd=$this->input->post('datumOd');

        if(!empty($datumOd))
            
            $datumOd = date("Y-m-d", strtotime($datumOd));

            $datumDo=$this->input->post('datumDo');
        
        if(!empty($datumDo))
            
            $datumDo = date("Y-m-d", strtotime($datumDo));

            $festivali=$this->GostModel->dohvatiSveFestivale($imeFestivala, $datumOd, $datumDo);
            
            echo "<table class='table text-light'style='font-weight: bold; font-size:125%; '><thead class='thead' style='font-weight: bold; font-size:125%;'><tr><th>Ime festivala:</th><th>Mesto:</th><th>Datum od:</th><th>Datum do:</th></tr></thead><tbody>";
            foreach($festivali as $f)  {
                echo "<tr><td style='font-weight: bold;'>". $f->NameFest. "</td><td>". $f->CityName. "</td><td style='font-weight: bold; '>". $f->StartDate. "</td><td style='font-weight: bold;'>". $f->EndDate. "</td></tr>";
                }
                echo "</tbody></table>";             
                       
                 
   
}

}
