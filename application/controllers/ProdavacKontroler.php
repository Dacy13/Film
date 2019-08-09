<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdavacKontroler extends CI_Controller {
    
    public function __construct() { 
        parent::__construct();
        $this->load->model('KorisnikModel');
        $this->load->model('ProdavacModel');
        
        $this->load->library ('pagination');
        
        if(!$this->session->has_userdata('korisnik')){
            redirect('Login');
        }
        $tip=$this->session->userdata('korisnik')->Type;
        if ($tip=='user') {
             redirect ('User');
        }
       
       
    }
    
    public function index(){
        $rezervacije= $this->SveRezervacije();
       
}
    public function logout(){
        $this->session->sess_destroy();
        redirect('LoginKontroler');
    }
    
    public function SveRezervacije () {
        
        $pocetna_rez=0;
        
        if($this->uri->segment(3)){
            $pocetna_rez=$this->uri->segment(3);
        }
        $this->load->model('ProdavacModel');
        $rezervacije=$this->ProdavacModel->dohvatiRezervacije ($pocetna_rez,LIMIT_PO_STRANICI);
               
        $this->load->library('pagination');
        
        $config=$this->config->item('pagination');
        
        $config['base_url'] = site_url("ProdavacKontroler/SveRezervacije");
        $config['total_rows'] = $this->ProdavacModel->BrojNeodobrenihRezervacija();
        $config['per_page'] = LIMIT_PO_STRANICI;
        $this->pagination->initialize($config);
        
        $data['middle']= 'middle/prodavac';
        $data['middle_podaci']=['rezervacije'=>$rezervacije]; 
        
        $this->load->view('basicTemplate', $data);
        
        
        
    }
    
    public function rezKarte () {
        
        $pocetna_rez=0;
        
        if($this->uri->segment(3)){
            $pocetna_rez=$this->uri->segment(3);
        }
        $this->load->model('ProdavacModel');
        $rezervacije=$this->ProdavacModel->dohvatiRezervisane ($pocetna_rez,LIMIT_PO_STRANICI);
               
        $this->load->library('pagination');
        
        $config=$this->config->item('pagination');
        
        $config['base_url'] = site_url("ProdavacKontroler/rezKarte");
        $config['total_rows'] = $this->ProdavacModel->BrojOdobrenihRezervacija();
        $config['per_page'] = LIMIT_PO_STRANICI;
        $this->pagination->initialize($config);
        
        $data['middle']='middle/rezervisanekarte';
        $data['middle_podaci']=['rezervacije'=>$rezervacije]; 
        
        $this->load->view('basicTemplate', $data);
        
        
    }
    
    
 public function nalog(){
        $id = $this->session->korisnik->Username;
        $podaci = $this->ProdavacModel->korisnici($id);
   
        $data['middle'] = 'middle/prodavacNalog';
        $data['middle_podaci'] = ['podaci' => $podaci];
        $this->load->view('basicTemplate', $data);
    }  
    
   
    
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
                
                $bazaBroj = $this->ProdavacModel->dohvatiBroj($id);
                
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
                $this->form_validation->set_message ('password_two_same_char', "Lozinka ne sme sadržati dva ista karaktera uzastopno!");
                
                if (!empty($novip)) {
                $this->form_validation->set_rules ( "ime", "ime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                $this->form_validation->set_rules ( "prezime", "prezime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                
                $this->form_validation->set_rules ( "broj",   "Broj mobilnog telefona",   "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']".$is_unique);
                $this->form_validation->set_rules ( "mejl", "Email", "trim|required|valid_email");
                
                
                $this->form_validation->set_rules ( "novip", "Password", "trim|min_length[8]|max_length[12]|alpha_numeric|callback_password_check_numbers|callback_password_check_upper|callback_password_check_lower|callback_password_two_same_char");
                $this->form_validation->set_rules ( "potvrda", "Password Confirmation", "trim|matches[novip]");
                   
                     if ($this->form_validation->run() == TRUE) {
                        
                         $this->ProdavacModel->update($id, $ime, $prezime, $broj, $mejl, $novip);
                      }                  
                
                }
                  else {
                       
                $this->form_validation->set_rules ( "ime", "ime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                $this->form_validation->set_rules ( "prezime", "prezime", "trim|required|min_length[5]|max_length[15]|callback_specijalni_znakovi");
                
                $this->form_validation->set_rules ( "broj",   "Broj mobilnog telefona",   "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']".$is_unique);
                $this->form_validation->set_rules ( "mejl", "Email", "trim|required|valid_email");
             
               if ($this->form_validation->run() == TRUE) {
                      
              $this->ProdavacModel->update($id, $ime, $prezime, $broj, $mejl, $pass);
                      }
               
              }
               
               $this->nalog();
               
        }     
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
         
     }
   

