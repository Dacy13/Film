<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikKontroler extends CI_Controller {
    
    public function __construct() { 
        parent::__construct();
        
        if(!$this->session->has_userdata('korisnik')){
            redirect('LoginKontroler');
        }
        $tip = $this->session->userdata('korisnik')->Type;
        if ($tip == 'prodavac') {
             redirect ('ProdavacKontroler');
        }
        $this->load->model('KorisnikModel');
    }
    
    public function index() {
        
        //ako imamo vise metoda koje treba da prikazu nesto na istoj stranici
        //onda u metodi pisemo return promenljiva
        //a u indexu pozivamo tu metodu, i u $data['middleData'] prosledjujemo 
        
//        $svi = $this->search();
        $ime = $this->pretraga();
        
        $festivali = $this->KorisnikModel->prikaziFestivale();
        
        $data['middle'] = 'middle/korisnik';
        $data['middle_podaci'] = ['festivali' => $festivali, 'filmovi'=>$ime];
        $this->load->view('basicTemplate', $data);
    }
    
  
    // funkcija za pretragu festivala i filmova sa jednim poljem
    
//   public function search(){
//    
//    $search = $this->input->post('search');
//    $svi = $this->KorisnikModel->search($search);
//    
//    return $svi;
//}

// funkcija za pretragu festivala i filmova sa vise polja
public function pretraga(){
   
           $imeFest = $this->input->post('imeFest'); 
            
            $pocetak = $this->input->post('od');
            if(!empty($pocetak)){
            $pocetak = date('Y-m-d', strtotime($pocetak));
            }
            $zavrsetak = $this->input->post('do');
            if(!empty($zavrsetak)){
            $zavrsetak = date('Y-m-d', strtotime($zavrsetak));
            }
            $engNaziv = $this->input->post('engNaziv');
             if(!empty($engNaziv)){
            $engNaziv = $this->input->post('engNaziv');
             }
             $srbNaziv = $this->input->post('srbNaziv');
             if(!empty($srbNaziv)){
            $srbNaziv = $this->input->post('srbNaziv');
             }
            if(!empty($imeFest) || !empty($pocetak) || !empty($zavrsetak) || !empty($engNaziv) || !empty($srbNaziv)){
                $festival = $this->KorisnikModel->pretragaFestivala($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv);
            }
            else {
                $festival=null;
            }
            return $festival; 
}

// podaci za view mojNalog

 public function nalog(){
        $id = $this->session->korisnik->Username;
        $podaci = $this->KorisnikModel->korisnici($id);
   
        $data['middle'] = 'middle/mojNalog';
        $data['middle_podaci'] = ['podaci' => $podaci];
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
        
        $rez = $this->KorisnikModel->dohvatiKarte();
        
        $k = $this->KorisnikModel->dohvatiKupljene();
        $o = $this->KorisnikModel->dohvatiOtkazane();
        $r = $this->KorisnikModel->dohvatiRezervisane();
        
        $idRez = $this->otkaziRez();
        
        $data['middle'] = 'middle/istorija';
        $data['middle_podaci'] = ['rez' => $rez,'k'=>$k, 'o'=>$o, 'r'=>$r, 'id'=>$idRez];
        $this->load->view('basicTemplate', $data);
          
          
      }
      
//      otkazivanje rezervacije
      
      public function otkaziRez(){
     $idRez = $this->input->post('red');
     return $idRez;
     
//     if(!empty(($this->input->post('otkazi')))){
//         
//          $idRez = $this->input->post('red_za_update');
//          $status = 'O';
//          
//          $this->KorisnikModel->promeniRezervaciju($idRez,$status);
         // return $idRez;
       // }
        //$this->istorija();
    }
      // logout
      
    public function logout(){
        $this->session->sess_destroy();
        redirect('LoginKontroler');
    }
}

