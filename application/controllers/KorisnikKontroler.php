<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikKontroler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
//        
//        if(!$this->session->has_userdata('user'))  
//      
//            redirect('/Login'); 
      
      $this->load->model('KorisnikModel');
    }
    
    public function index() {
        
//        if($this->session->user != null ){
//            redirect('/KorisnikKontroler');
//        }
    
        $start = $this->KorisnikModel->pocetak();
        $kraj = $this->KorisnikModel->kraj();
        
        //sa $sad i $time povlacimo danasnji datum, pa u if-u uporedjujemo sa pocetkom/krajem festivala
        
        $sad = date("Y-m-d");
        $time = date('Y-m-d', strtotime($sad));
        
        if( ( $time >= $start || $time<= $start) && $time<$kraj){
             $festivali = $this->KorisnikModel->prikaziFestivale();
        }

        $data['middle'] = 'middle/korisnik';
        $data['middleData'] = ['festivali' => $festivali];
        $this->load->view('basicTemplate', $data);
    }
    

public function proba(){
   
    if(isset($_GET['trazi'])) {
            $imeFest = $this->input->get('imeFest');
            $engNaziv = $this->input->get('engNaziv');
            $srbNaziv = $this->input->get('srbNaziv');
            $pocetak = $this->input->get('od');
            $zavrsetak = $this->input->get('do');

            $festivali = $this->KorisnikModel->pretragaFestivala();

            $festival = $festivali." where NameFest like '%$imeFest%'";
                 
         
             $start = $this->KorisnikModel->pocetak();
             $kraj = $this->KorisnikModel->kraj();
            
             
//        da izlista sve festivale koji nisu zavrseni i da moze da se pretrazuje sa vise parametara istovremeno
//            
//                 if( (($pocetak >= $start) || ($pocetak <= $start)) && ($pocetak <= kraj)) {
//                        if(!empty($pocetak)) {
//                            $festival = $festival . " and StartDate >= $pocetak";
//                        }
//
//                        if(!empty($kraj)) {
//                            $festival = $festival . " and EndDate <= $kraj";
//                        }
//
//                        if(!empty($engNaziv)) {
//                             $festival = $festival. " and OriginalTitle = $engNaziv";
//                        }
//
//                        if(!empty($srbNaziv)) {
//                            $festival = $festival . " and SerbianTitle = $srbNaziv";
//                        }
//        
                $data['middle'] = ['middle/korisnik'];
                $data['middleData'] = ['festival' => $festival];
                $this->load->view('basicTemplate', $data);
                 }
}

}

