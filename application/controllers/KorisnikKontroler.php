<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikKontroler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
//        if($this->session->has_userdata('korisnik')){
//            redirect('/KorisnikKontroler');
//        }
      
      $this->load->model('KorisnikModel');
    }
    
    public function index() {
        
        //ako imamo vise metoda koje treba da prikazu nesto na istoj stranici
        //onda u metodi pisemo return promenljiva
        //a u indexu pozivamo tu metodu, i u $data['middleData'] prosledjujemo 
        
        $festivali = $this->KorisnikModel->prikaziFestivale();

        $data['middle'] = 'middle/korisnik';
        $data['middleData'] = ['festivali' => $festivali, 'filmovi'=>$this->KorisnikModel->pretragaFestivala()];
        $this->load->view('basicTemplate', $data);
    }
    

public function pretraga(){
   
    if(isset($_GET['trazi'])) {
            $imeFest = $this->input->get('imeFest');
            $engNaziv = $this->input->get('engNaziv');
            $srbNaziv = $this->input->get('srbNaziv');
            $pocetak = $this->input->get('od');
            $zavrsetak = $this->input->get('do');

            
            $poc = date('Y-m-d', strtotime($pocetak));
            $zav = date('Y-m-d', strtotime($zavrsetak));
            
            
            $svi = $this->KorisnikModel->pretragaFestivala();

            $festival = $svi." where NameFest like '%$imeFest%'";
                 
         
             $start = $this->KorisnikModel->pocetak();
             $kraj = $this->KorisnikModel->kraj();
            
            
       // da izlista sve festivale koji nisu zavrseni i da moze da se pretrazuje sa vise parametara istovremeno
            
                 if( (($poc >= $start) || ($poc <= $start)) && ($poc <= $kraj)) {
                        if(!empty($pocetak)) {
                            $festival = $svi . " and StartDate >= $pocetak";
                        }

                        if(!empty($kraj)) {
                            $festival = $svi . " and EndDate <= $kraj";
                        }

                        if(!empty($engNaziv)) {
                             $festival = $svi. " and OriginalTitle = $engNaziv";
                        }

                        if(!empty($srbNaziv)) {
                            $festival = $svi . " and SerbianTitle = $srbNaziv";
                        }
        
                 }
               
}
  return $festival;
}
}
