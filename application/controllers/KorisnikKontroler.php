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
        $svi= $this->search();
        
        $festivali = $this->KorisnikModel->prikaziFestivale();
       $ime = $this->pretraga();
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
   
    if(isset($_GET['trazi'])) {
            $imeFest = $this->input->post('imeFest');
            $engNaziv = $this->input->post('engNaziv');
            $srbNaziv = $this->input->post('srbNaziv');
            $pocetak = $this->input->post('od');
            $zavrsetak = $this->input->post('do');

            
            $poc = date('Y-m-d', strtotime($pocetak));
            $zav = date('Y-m-d', strtotime($zavrsetak));
            
            
            $svi= $this->KorisnikModel->pretragaFestivala();

            $festival = $svi." where NameFest like '%$imeFest%'";
                           
       // da izlista sve festivale koji nisu zavrseni i da moze da se pretrazuje sa vise parametara istovremeno
            
                // if( (($poc >= $start) || ($poc <= $start)) && ($poc <= $kraj)) {
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
        
                // }
               return $festival;   
    }
 
}


 public function nalog(){
        $id = $this->session->korisnik['Username'];
       $podaci = $this->KorisnikModel->korisnici($id);
     
       $this->izmena();
        $data['middle'] = 'middle/mojNalog';
        $data['middleData'] = ['podaci' => $podaci];
        $this->load->view('basicTemplate', $data);
    }
    
  public function izmena(){
      
  if($this->input->post('izmeni') != NULL){
          $id = $this->session->korisnik['Username'];
          $ime = $this->post['ime'];
          $prezime = $this->post['prezime'];
          $broj = $this->post['broj'];
          $mejl = $this->post['mejl'];
          $password = $this->post['password'];
          $novip= $this->post['novip'];
          $potvrda= $this->post['potvrda'];
          
        $data = array(
                    'Name' => $ime,
                    'Surname' => $prezime,
                    'Mobile' => $broj,
                    'Email' => $mejl);
        
        $this->KorisnikModel->updateKor($id,$data);
//        $this->nalog();
        }
        $this->KorisnikModel->update($id,$data);
        $this->nalog();
      }
      
}
      
      
      
  
