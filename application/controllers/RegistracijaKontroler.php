<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegistracijaKontroler extends CI_Controller {

   public function __construct() {
      parent::__construct();
      
      $this->load->helper(array('form' , 'url'));
      $this->load->library('form_validation');

      if ($this->session->has_userdata('korisnik')) {
         $tip = $this->session->userdata('korisnik')->Type;

         if ($tip == 'prodavac') {
            redirect('ProdavacKontroler');
         } elseif ($tip == 'admin') {
            redirect('AdminKontroler');
         } else {
            redirect('KorisnikKontroler');
         }
      }
      $this->load->model('KorisnikModel');
   }

   public function index() {

      $data["middle"] = "middle/index";
      $data["footer_podaci"] = ['poruka' => 'Neispravni podaci'];
      $data["header_podaci"] = ['poruka' => 'Neispravni podaci'];
      $this->load->view('basicTemplate', $data);
   }

   public function register() {
       
      if ($this->input->post('registruj')) {
                

///////     Setovane error poruke   ///////
      $this->form_validation->set_message('is_unique', 'Korisnicko ime vec postoji!');
      $this->form_validation->set_message('alpha', 'Iskljucivo slova!');
      $this->form_validation->set_message('alpha_numeric', 'Dozvoljeni au brojeevi i slova!!!');
      $this->form_validation->set_message('required', 'Polje {field} je obavezno');
      $this->form_validation->set_message('min_length', 'Polje {field} mora imati najmanje {param} karaktera');
      $this->form_validation->set_message('max_length', 'Polje {field} mora imati najvise {param} karaktera');
      $this->form_validation->set_message('matches', 'Lozinka i ponovljena lozinka nisu iste');
      $this->form_validation->set_message('mobilni', 'Mobilni broj nije ispravan!');
      $this->form_validation->set_message('valid_email', 'Email format nije ispravan!');
      $this->form_validation->set_message('password_check_numbers', "Lozinka mora da sadrzi bar 1 broj!");
      $this->form_validation->set_message('password_check_first', "Lozinka mora poceti sa Velikim slovom!");
      $this->form_validation->set_message('password_check_upper', "Lozinka mora da sadrzi bar 2 Velikia slova!");
      $this->form_validation->set_message('password_check_lower', "Lozinka mora da sadrzi bar 3 mala slova!");
      $this->form_validation->set_message('password_two_same_char', "Lozinka ne sme sadrzati dva ista karaktera uzastopno!");

///////   SET RULES   //////
//
      //   korisnicko ime
      $this->form_validation->set_rules("korIme", "Username", "trim|required|alpha_numeric|min_length[5]|max_length[15]|is_unique[korisnici.Username]");

      //   password and password check
      $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|max_length[12]|alpha_numeric|callback_password_check_numbers|callback_password_check_first|callback_password_check_upper|callback_password_check_lower|callback_password_two_same_char");
      $this->form_validation->set_rules("passwordConfirmation", "Password Confirmation", "trim|required|matches[password]");

      //   ime i prezime
      $this->form_validation->set_rules("ime", "Ime", "trim|required|alpha|min_length[5]|max_length[15]");
      $this->form_validation->set_rules("prezime", "Prezime", "trim|required|alpha|min_length[5]|max_length[15]");

      //   datum i mobilni broj
      $this->form_validation->set_rules("rodjendan", "Rodjendan", "trim|required");
      $this->form_validation->set_rules("mobilni", "Mobilni", "trim|required|is_natural|regex_match['(06)(\d)(\d){3}(\d){3,4}']|is_unique[korisnici.Mobile]");

      //   email
      $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");

      if ($this->form_validation->run() == FALSE) {
         $this->index();
      } else {
                $korIme    = $this->input->post("korIme");
                $password  = $this->input->post("password"); 
                $ime       = $this->input->post("ime"); 
                $prezime   = $this->input->post("prezime");
                $rodjendan = $this->input->post("rodjendan"); 
                $mobilni   = $this->input->post("mobilni"); 
                $email     = $this->input->post("email");    
          
          $this->load->model("RegistracijaModel");
          $this->RegistracijaModel->registruj($korIme, $password, $ime, $prezime, $rodjendan, $mobilni, $email);
//         $this->load->model("RegistracijaModel");
//         $this->RegistracijaModel->registruj(
//                 $this->input->post("korIme"), 
//                 $this->input->post("password"), 
//                 $this->input->post("ime"), 
//                 $this->input->post("prezime"), 
//                 $this->input->post("rodjendan"), 
//                 $this->input->post("mobilni"), 
//                 $this->input->post("email")
                 
                 
//                 $korIme, $password, $ime, $prezime, $rodjendan, $mobilni, $email
//             
//         );
         redirect("/LoginKontroler");
      }
      }
   }

////  funkcija za proveru/poklapanje sifre sa regex-om  ////// 
   public function password_check_numbers($str) {

      if (!preg_match_all("#[0-9]+#", $str)) {
         return false;
      }
      return true;
   }
   
     public function password_check_first($str) {

      if (!preg_match_all("#(^[A-Z])#", $str)) {
         return false;
      }
      return true;
   }

   public function password_check_upper($str) {

      if (!preg_match_all("#(?=.*[A-Z]){2,}#", $str)) {
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

   public function password_two_same_char($str) {
      if (preg_match_all("#(.)\1#", $str)) {
         return false;
      }
      return true;
   }

   public function password_check($str) {

      if ($poruka == "")
         return true;
      else
         return $passwordErr;
   }

}



