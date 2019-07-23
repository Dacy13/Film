<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistracijaModel extends CI_Model{

   public function register ( $korIme, $password, $ime, $prezime, $rodjendan, $mobilni, $email ) {
        
        $data=[         
            "Username"    => $korIme,
            "Password"    => password_hash($password,PASSWORD_BCRYPT),
            "Name"        => $ime,
            "Surname"     => $prezime,
            "DateOfBirth" => $rodjendan,
            "Mobile"      => $mobilni,
            "Email"       => $email 
        ];
        
        $this->db->insert ( "korisnici", $data );
    }
}
