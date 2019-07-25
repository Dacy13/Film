<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
    
 public function login($username, $password){
     
    $query = $this->db->get_where('korisnici', array( 
                                  'username' => $username, 
                                  'password' => $password));
    
        if($this->db->count_all_results()>0)
            return true;
        else 
            return false;         
    }

// dohvatanje pojedinacnog korisnika iz baze Ivana/Gaga/Tamara
    
 public function dohvatiUsera($username){
        
        $this->db->where('username', $username);
        $query=$this->db->get('korisnici');
        return $query->row();
    }
    
}