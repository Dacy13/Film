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

    public function index ( ) {
        $data["middle"] = "middle/index";
        $data["footer_podaci"]=['poruka'=>'Neispravni podaci'];
        $data["header_podaci"]=['poruka'=>'Neispravni podaci'];
        $this->load->view( 'basicTemplate', $data );
    }
    
    public function register ( ) {
        
//        setovane error poruke
        $this->form_validation->set_message( 'is_unique',   'Korisnicko ime vec postoji!' );
        $this->form_validation->set_message( 'required',    'Polje {field} je obavezno' );
        $this->form_validation->set_message( 'min_length',  'Polje {field} mora imati najmanje {param} karaktera' );   
        $this->form_validation->set_message( 'max_length',  'Polje {field} mora imati najvise {param} karaktera' );
        $this->form_validation->set_message( 'matches',     'Lozinka i ponovljena lozinka nisu iste' );
        $this->form_validation->set_message( 'regex_match', 'Mobilni broj nije ispravan!' );
//        $this->form_validation->set_message('exact_length','Polje {field} mora imati tacno {param} karaktera');        
        
//        korisnicko 
        $this->form_validation->set_rules ( "korIme", "Username", "trim|required|min_length[5]|max_length[15]|is_unique[korisnici.Username]" );
        
//        password and password check
        $this->form_validation->set_rules ( "password", "Password", "trim|required|min_length[8]|max_length[12]|alpha_numeric|callback_password_check" );
        $this->form_validation->set_rules ( "passwordConfirmation", "Password Confirmation", "trim|required|matches[password]" );
        
//        ime i prezime
        $this->form_validation->set_rules ( "ime",     "Ime", "trim|required|min_length[5]|max_length[15]" );
        $this->form_validation->set_rules ( "prezime", "Prezime",  "trim|required|min_length[5]|max_length[15]" );
        
//        datum i mobilni broj
//        $this->form_validation->set_rules ( "rodjendan", "Rodjendan", "trim|required|callback_dob_check");
//        $this->form_validation->set_rules ( "mobilni",   "Mobilni",   "trim|required|is_natural|regex_match['/^\d{3}\/?\d{6,7}$/']");
//        email
        $this->form_validation->set_rules ( "email", "Email", "trim|required|valid_email" );
                                  
        if ( $this->form_validation->run ( ) == FALSE ) {
            $this->index ( );
        } else {
            $this->load->model( "RegistracijaModel" );
            $this->RegistracijaModel->register ( 
                    
                $this->input->post ( "korIme" ),
                $this->input->post ( "password" ),
                $this->input->post ( "ime" ), 
                $this->input->post ( "prezime" ),
                $this->input->post ( "rodjendan" ), 
                $this->input->post ( "mobilni" ),
                $this->input->post ( "email" )
            );
            redirect ( "/korisnik" );
        }
    }
        
    public function password_check($str){
    
//        if (preg_match('^(?=.[A-Z]{2,})(?=.[a-z]{3,})(?=.+\d)[A-Za-z\d]{8,12}$^', $str)) {
//          return TRUE;
//        }
        if(!preg_match("#[0-9]+#",$str)) {
            
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]{2,}#",$str)) {
            
            $passwordErr = "Your Password Must Contain At Least 2 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]{3,}#",$str)) {
            
            $passwordErr = "Your Password Must Contain At Least 3 Lowercase Letter!";
        }
        else {          
//            return FALSE;
            return TRUE;
        }
   
     }
    
    
  
}
