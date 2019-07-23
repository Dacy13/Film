<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistracijaKontroler extends CI_Controller{
    
    public function __construct() {
        
        parent::__construct();
         
        if($this->session->has_userdata('korisnik')){
            $tip=$this->session->userdata('korisnik')->Type;

            if ($tip=='prodavac') {
                redirect ('ProdavacKontroler');

            }       
            else {
                redirect ('KorisnikKontroler');
            }
        }
        
         $this->load->model('KorisnikModel');
    }
//        $this->load->helper ('security');

       public function index() {
        
        $data["middle"] = "middle/index";
        $data["footer_podaci"] = ['poruka' => 'Neispravni podaci'];
        $data["header_podaci"] = ['poruka' => 'Neispravni podaci'];
        $this->load->view('basicTemplate', $data);
    }

    public function register() {

///////     Setovane error poruke   ///////
        $this->form_validation->set_message('is_unique', 'Korisnicko ime vec postoji!');
        $this->form_validation->set_message('alpha', 'Iskljucivo slova!');
        $this->form_validation->set_message('required', 'Polje {field} je obavezno');
        $this->form_validation->set_message('min_length', 'Polje {field} mora imati najmanje {param} karaktera');
        $this->form_validation->set_message('max_length', 'Polje {field} mora imati najvise {param} karaktera');
        $this->form_validation->set_message('matches', 'Lozinka i ponovljena lozinka nisu iste');
        $this->form_validation->set_message('mobilni', 'Mobilni broj nije ispravan!');
        $this->form_validation->set_message('valid_email', 'Email format nije ispravan!');
        $this->form_validation->set_message('password_check_numbers', "Your Password Must Contain At Least 1 Number!");
        $this->form_validation->set_message('password_check_upper', "Your Password Must Contain At Least 2 and start with Capital Letter!");
        $this->form_validation->set_message('password_check_lower', "Your Password Must Contain At Least 3 Lowercase Letter!");
        
//        $this->form_validation->set_message('exact_length','Polje {field} mora imati tacno {param} karaktera'); 
       
///////   SET RULES   //////
    //   korisnicko ime
        $this->form_validation->set_rules("username", "Username", "trim|required|alpha_numeric|min_length[5]|max_length[15]|is_unique[korisnici.Username]");

    //   password and password check
        $this->form_validation->set_rules ( "password", "Password", "trim|required|min_length[8]|max_length[12]|alpha_numeric|callback_password_check_numbers|callback_password_check_upper|callback_password_check_lower");
        $this->form_validation->set_rules ( "passwordConfirmation", "Password Confirmation", "trim|required|matches[password]");

    //   ime i prezime
        $this->form_validation->set_rules ( "ime", "Ime", "trim|required|alpha|min_length[5]|max_length[15]");
        $this->form_validation->set_rules ( "prezime", "Prezime", "trim|required|alpha|min_length[5]|max_length[15]");

    //   datum i mobilni broj
        $this->form_validation->set_rules ( "rodjendan", "Rodjendan", "trim|required");
        $this->form_validation->set_rules ( "mobilni",   "Mobilni",   "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']|is_unique[korisnici.Mobile] ");
        
    //   email
        $this->form_validation->set_rules ( "email", "Email", "trim|required|valid_email");

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->load->model("RegistracijaModel");
            $this->RegistracijaModel->register(
                    
                    $this->input->post("username"),
                    $this->input->post("password"),
                    $this->input->post("ime"),
                    $this->input->post("prezime"),
                    $this->input->post("rodjendan"),
                    $this->input->post("mobilni"),
                    $this->input->post("email")
            );
            redirect("/korisnik");
        }
    }
    
////  funkcija za proveru/poklapanje sifre sa regex-om  ////// 
    public function password_check_numbers($str) {

        if (!preg_match_all("#[0-9]+#", $str)) {
             return false; 
        }
        return true;
    }
    
    public function password_check_upper($str) {

       if (!preg_match_all("#^[A-Z]{2,}#", $str)) {
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

//        if (preg_match('^(?=.[A-Z]{2,})(?=.[a-z]{3,})(?=.+\d)[A-Za-z\d]{8,12}$^', $str)) {
//          return TRUE;
//        }
//        $passwordErr="";
//        if (!preg_match_all("#[0-9]+#", $str)) {
//            $passwordErr .= "Your Password Must Contain At Least 1 Number!";
//            
//        }
//        if (!preg_match_all("#^[A-Z]{2,}#", $str)) {
//            $passwordErr .= "Your Password Must Contain At Least 2 Capital Letter!";
//            
//        } 
//        if (!preg_match_all("#[a-z]{3,}#", $str)) {
//            $passwordErr .= "Your Password Must Contain At Least 3 Lowercase Letter!";
//            
//        }
        if($poruka=="")
            return true;
        else
            return $passwordErr;
    } 
}
    

