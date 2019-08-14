<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilmKontroler extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
        $this->load->model('FilmModel');
    }
    
    public function index() { 
          
        $IdFilm= $this->input->get('id');
        $filmovi=$this->FilmModel->dohvatiFilm($IdFilm);
        $komentari=$this->FilmModel->SviKomentari($IdFilm); 
        $projekcije=$this->FilmModel->projekcije($IdFilm);
        $rating=$this->FilmModel->DohvatiRating($IdFilm);
        $karte=$this->FilmModel->dohvatiKarte($IdFilm);
        $Username= $this->session->userdata('korisnik')->Username;
        $rezervacija=$this->FilmModel->kupac($Username);
          
        $data['middle']='middle/film';
        $data["middle_podaci"]=['filmovi'=>$filmovi, 'komentari'=>$komentari, 'projekcije'=>$projekcije, 'karte'=>$karte, 'rezervacija'=>$rezervacija, 'rating'=>$rating];
        $this->load->view('basicTemplate', $data);
   }

     public function rejting(){

        $Rating = $this->input->post('rating');
        $IdFilm = $this->input->get('id');
        $Username = $this->session->userdata('korisnik')->Username;
        $this->FilmModel->rejting($Rating, $IdFilm, $Username);
        $rating = $this->FilmModel->DohvatiRating($IdFilm);
       
        echo (round($rating,1));

     }
    
    public function rezervacija () {
       
        $StatusRez = 'N';
        $length = 10;    
        $Code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        $Tickets = $this->input->post('karte');
        $IdProjekcija = $this->input->post('IdRezervacije');
                
        $Username = $this->session->userdata('korisnik')->Username;
        
        $this->FilmModel->rezervacija($StatusRez, $Code, $Tickets, $IdProjekcija, $Username);
        redirect(site_url('FilmKontroler/index'));
      
    }

    //AJAXXXXXX 
    
    
    public function dodajKomentarAjax(){
         
        
        $TekstKomentara= $this->input->post('TekstKomentara');
        $IdFilm= $this->input->get('id');
        $Username= $this->session->userdata('korisnik')->Username;
        $this->FilmModel->dodajKomentarAjax($TekstKomentara, $IdFilm, $Username);
        
        
        //ovo je dodatak iz ajaxa
        //SAMO OVOOO LADNOOOO
        //dohvatila opet komentare iz modela da bi ih ispisala logi;no ka\e ljuba
        //i OBAVEYNO DA ISPISES JER AJAX SAMO PREPOYNAJE HTML I TO JE ONO STO MU VRACAS U THIS RESPONZE TEXT zato radimo foreach
        $komentari=$this->FilmModel->SviKomentari($IdFilm); 
        
         foreach ($komentari as $kom) {
             echo "<div class='row' id='komentari'><div class='col-12' style='font-weight: bold;'>". $kom->Username. "</div></div><div class='row'><div class='col-12'>". $kom->TekstKomentara." </div></div><div class='row'><br></div>";
            
            
        }
        
    }
   
   
    
    
    
    
    
    
    
    
   }
