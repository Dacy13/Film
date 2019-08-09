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
        $festival = $this->pretraga();
        
        $festivali = $this->KorisnikModel->prikaziFestivale();

        $broj = $this->brojPretrage();
       
        $data['middle'] = 'middle/korisnik';
        $data['middle_podaci'] = ['festivali' => $festivali, 'filmovi'=>$festival,
                                    'broj'=>$broj];
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


    public function brojPretrage(){
        $imeFest = $this->input->post('imeFest');
        $pocetak = $this->input->post('od');
        $zavrsetak = $this->input->post('do');
        $engNaziv = $this->input->post('engNaziv');
        $srbNaziv = $this->input->post('srbNaziv');
        
        if(!empty($imeFest) || !empty($pocetak) || !empty($zavrsetak) || !empty($engNaziv) || !empty($srbNaziv)){
                $broj = $this->KorisnikModel->brojRez($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv);
            }
            else {
                $broj= null;
            }
            return $broj;
    }

// funkcija za pretragu festivala i filmova sa vise polja
public function pretraga(){
    
            $imeFest = $this->input->post('imeFest'); 
                if(!empty($imeFest)){
                    $imeFest = $this->input->post('imeFest');
                 }
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
                
            $prva = 0;
        
            if($this->uri->segment(3)){
               $prva = $this->uri->segment(3);
            } 
            $this->load->library('pagination');
        
            $config=$this->config->item('pagination');
                
            if(!empty($imeFest) || !empty($pocetak) || !empty($zavrsetak) || !empty($engNaziv) || !empty($srbNaziv)){
                $festival = $this->KorisnikModel->pretragaFestivala($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv, $prva, LIMIT_PO_STRANICI);
            }
            else {
                $festival= null;
            }

            $config['base_url'] = site_url("KorisnikKontroler/index");
            $config['total_rows'] = $this->KorisnikModel->brojRez($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv);
            $config['per_page'] = LIMIT_PO_STRANICI;
            $this->pagination->initialize($config); 
            
            return $festival; 
           
}

// podaci za view mojNalog

 public function nalog(){
        $id = $this->session->korisnik->Username;
        $podaci = $this->KorisnikModel->korisnici($id);
        
        $data['middle'] = 'middle/korisnikNalog';
        $data['middle_podaci'] = ['podaci' => $podaci];
        $this->load->view('basicTemplate', $data);
    }
    
 // update podataka o korisniku 
    
//  public function izmena(){
//      
//        if(!empty(($this->input->post('izmeni')))){
//
//                $id = $this->session->korisnik->Username;
//                $sifra = $this->session->korisnik->Password;
//
//                $ime = $this->input->post('ime');
//                $prezime = $this->input->post('prezime');
//                $broj = $this->input->post('broj');
//                $mejl = $this->input->post('mejl');
//
//                $pass = $this->input->post('password');
//                $novip= $this->input->post('novip');
//                $potvrda= $this->input->post('potvrda');
//
//                  if($sifra == $pass){
//                      if($novip == $potvrda){
//
//                         $novip= $this->input->post('novip');
//                      }
//                  }
//
//              $this->KorisnikModel->update($id, $ime, $prezime, $broj, $mejl, $novip);
//              }
//
//               $this->nalog();
//    }
    public function izmenaGaga(){
      
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
                
                $bazaBroj = $this->KorisnikModel->dohvatiBroj($id);
                
                if( strcmp($broj, $bazaBroj)) {
                    $is_unique =  '|is_unique[korisnici.Mobile]';
                    } else {
                    $is_unique =  '';
                        }

                $this->form_validation->set_message('required', 'Polje {field} je obavezno');
                $this->form_validation->set_message('min_length', 'Polje {field} mora imati najmanje {param} karaktera');
                $this->form_validation->set_message('max_length', 'Polje {field} mora imati najvise {param} karaktera');
                $this->form_validation->set_message('matches', 'Lozinka i ponovljena lozinka nisu iste');
                $this->form_validation->set_message('is_unique', '{field} već postoji u bazi!');
                $this->form_validation->set_message('valid_email', 'Email format nije ispravan!');
                $this->form_validation->set_message('password_check_numbers', "Lozinka mora sadržati bar jedan broj!");
                $this->form_validation->set_message('password_check_upper', "Lozinka mora da sadrži bar 2 velika slova i da počinje velikim slovom!");
                $this->form_validation->set_message('password_check_lower', "Lozinka mora sadržati bar 3 mala slova!");
                $this->form_validation->set_message('password_two_same_char', "Lozinka ne sme sadržati dva ista karaktera uzastopno!");
                
                if (!empty($novip)) {
                $this->form_validation->set_rules ( "ime", "ime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                $this->form_validation->set_rules ( "prezime", "prezime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                
                $this->form_validation->set_rules ( "broj",   "Broj mobilnog telefona",   "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']".$is_unique);
                $this->form_validation->set_rules ( "mejl", "Email", "trim|required|valid_email");
                
                
                $this->form_validation->set_rules ( "novip", "Password", "trim|min_length[8]|max_length[12]|alpha_numeric|callback_password_check_numbers|callback_password_check_upper|callback_password_check_lower|callback_password_two_same_char");
                $this->form_validation->set_rules ( "potvrda", "Password Confirmation", "trim|matches[novip]");
                   
                     if ($this->form_validation->run() == TRUE) {
                        
                         $this->KorisnikModel->update($id, $ime, $prezime, $broj, $mejl, $novip);
                    }                  
                }
                  else {
                       
                $this->form_validation->set_rules ( "ime", "ime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                $this->form_validation->set_rules ( "prezime", "prezime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                
                $this->form_validation->set_rules ( "broj",   "Broj mobilnog telefona",   "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']".$is_unique);
                $this->form_validation->set_rules ( "mejl", "Email", "trim|required|valid_email");
             
                    if ($this->form_validation->run() == TRUE) {

                         $this->KorisnikModel->updateBez($id, $ime, $prezime, $broj, $mejl, $pass);
                    }
               }
               
              // $this->nalog();      
        }     
        $this->nalog();   
    }    
    public function password_check_numbers($str) {
        if (!preg_match_all("#[0-9]+#", $str)) {
             return false; 
        }
        return true;
    }
    
    public function password_check_upper($str) {
       if (!preg_match_all("#^(.*?[A-Z]){2,}#", $str)) {
            return false; 
        }
        return true;
    }
    
    public function password_check_lower($str) {
        if (!preg_match_all("#[a-z]{3,}#", $str)) {
             return false; 
        }
        return true;
    }
     public function password_check($str) {
         
          if($poruka=="")
            return true;
        else
            return $passwordErr;
     }
     
     public function password_two_same_char ($str) {
         if (!preg_match_all("#(?!.*(.)\1)#", $str)) {
            return false; 
        }
        return true;
     }
     
     public function specijalni_znakovi ($str) {
         if (!preg_match_all("#\p{L}#", $str)) {
            return false; 
        }
        
        else if (preg_match_all("#.*\\d+.*#", $str)) {
            return false;
        }
         else {       
        
        return true;
         }
     }

 //  prikazivanje podataka na stranici istorija
      
      public function istorija() {
        
        $rez = $this->KorisnikModel->dohvatiKarte();
        
        $k = $this->KorisnikModel->dohvatiKupljene();
        $o = $this->KorisnikModel->dohvatiOtkazane();
        $r = $this->KorisnikModel->dohvatiRezervisane();
        
$this->otkaziRez();
        
        
        $data['middle'] = 'middle/istorija';
        $data['middle_podaci'] = ['rez' => $rez,'k'=>$k, 'o'=>$o, 'r'=>$r];
        $this->load->view('basicTemplate', $data);
          
          
      }

//      otkazivanje rezervacije
      
      public function otkaziRez(){
 
          $idRez = $this->input->post('red');
          $status = 'O';
          $this->KorisnikModel->promeniRezervaciju($idRez, $status);
          
//          $tiket = $this->KorisnikModel->karte();
//          $ukupno = $this->KorisnikModel->ukupnoKarte();
//          $idP = $this->input->post('pro');
//          $karte = $ukupno + $tiket;
          
         // $this->KorisnikModel->vratiKarte($idP, $karte);

    }
      // logout
      
    public function logout(){
        $this->session->sess_destroy();
        redirect('LoginKontroler');
    }
}

