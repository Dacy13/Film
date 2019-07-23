<?php

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
    
       // IVANIN MODEL ZA LOGIN za pretragu festivala na pocetnoj strani
  public function dohvatiSveFestivale($imeFestivala, $datumOd, $datumDo) {
     
        $this->db->select('*');
        $this->db->from('festivali');
       
        $this->db->like('NameFest',$imeFestivala);
        $this->db->or_like('StartDate',$datumOd);
        $this->db->or_like('EndDate',$datumDo);
    
        $query = $this->db->get();
        return $query->result();
    }
}