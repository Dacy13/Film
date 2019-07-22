<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikKontroler extends CI_Controller {
    
    public function __construct() { 
        parent::__construct();
        
        if(!$this->session->has_userdata('korisnik')){
            redirect('Login');
        }
        $tip = $this->session->userdata('korisnik')->Type;
        if ($tip=='prodavac') {
             redirect ('ProdavacKontroler');
        }
        $this->load->model('KorisnikModel');
    }
    
    public function index() {
        
        //ako imamo vise metoda koje treba da prikazu nesto na istoj stranici
        //onda u metodi pisemo return promenljiva
        //a u indexu pozivamo tu metodu, i u $data['middleData'] prosledjujemo 
        
        $svi = $this->search();
        $ime = $this->pretraga();
        
        $festivali = $this->KorisnikModel->prikaziFestivale();
        
        $data['middle'] = 'middle/korisnik';
        $data['middleData'] = ['festivali' => $festivali, 'filmovi'=>$ime,
             'search'=>$svi];
        $this->load->view('basicTemplate', $data);
    }
    
  
    // funkcija za pretragu festivala i filmova
    
   public function search(){
    
    $search = $this->input->post('search');
    $svi = $this->KorisnikModel->search($search);
    
    return $svi;
}


public function pretraga(){
   
            $imeFest = $this->input->post('imeFest');
            
            
            $pocetak = $this->input->post('od');
            $poc = date('Y-m-d', strtotime($pocetak));
            
            $zavrsetak = $this->input->post('do');
            $zav = date('Y-m-d', strtotime($zavrsetak));
            
            $engNaziv = $this->input->post('engNaziv');
            $srbNaziv = $this->input->post('srbNaziv');
            
            $festival= $this->KorisnikModel->pretragaFestivala($imeFest,$poc,$zav,$engNaziv,$srbNaziv);
            return $festival;   
            $this->index();
//            $festival = $svi." where NameFest like '%$imeFest%'";
//                           
//       // da izlista sve festivale koji nisu zavrseni i da moze da se pretrazuje sa vise parametara istovremeno
//            
//                // if( (($poc >= $start) || ($poc <= $start)) && ($poc <= $kraj)) {
//                        if(!empty($pocetak)) {
//                            $festival = $svi . " and StartDate >= $pocetak";
//                        }
//
//                        if(!empty($kraj)) {
//                            $festival = $svi . " and EndDate <= $kraj";
//                        }
//
//                        if(!empty($engNaziv)) {
//                             $festival = $svi. " and OriginalTitle = $engNaziv";
//                        }
//
//                        if(!empty($srbNaziv)) {
//                            $festival = $svi . " and SerbianTitle = $srbNaziv";
//                        }
//        
                // }
              
}

// podaci za view mojNalog

 public function nalog(){
        $id = $this->session->korisnik->Username;
        $podaci = $this->KorisnikModel->korisnici($id);
   
        $data['middle'] = 'middle/mojNalog';
        $data['middleData'] = ['podaci' => $podaci];
        $this->load->view('basicTemplate', $data);
    }
    
 // update podataka o korisniku 
    
  public function izmena(){
      
        if(!empty(($this->input->post('izmeni')))){

                $id = $this->session->korisnik->Username;
                $sifra = $this->session->korisnik->Password;

                $ime = $this->input->post('ime');
                $prezime = $this->input->post('prezime');
                $broj = $this->input->post('broj');
                $mejl = $this->input->post('mejl');

                $pass = $this->input->post('password');
                $novip= $this->input->post('novip');
                $potvrda= $this->input->post('potvrda');

                  if($sifra == $pass){
                      if($novip == $potvrda){

                         $novip= $this->input->post('novip');
                      }
                  }

              $this->KorisnikModel->update($id, $ime, $prezime, $broj, $mejl, $novip);
              }

               $this->nalog();
    }

 //  prikazivanje podataka na stranici istorija
      
      public function istorija() {
          
        $data['middle'] = 'middle/istorija';
        
        $this->load->view('basicTemplate', $data);
          
          
      }
     
    // prikazivanje podataka na stranici rezervacija 
      
      public function rezervacija() {
          
        $data['middle'] = 'middle/rezervacija';
        
        $this->load->view('basicTemplate', $data);
          
      }
      
      // logout
      
    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}

