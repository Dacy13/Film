<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProdavacModel extends CI_Model {
    
   public function dohvatiRezervacije($pocetna_rez,$limit) {
        $this->db->select("r.Tickets, r.DateOfRez, r.StatusRez,k.Name, k.Surname,k.Username, f.OriginalTitle");
        $this->db->from('rezervacije r');
        $this->db->join('korisnici k', 'r.Username=k.Username');
        $this->db->join('projekcije p', 'r.IdProjekcija=p.IdProjekcija');
        $this->db->join('filmovi f', 'f.IdFilm=p.IdFilm');
        $this->db->where('StatusRez','N');
        $this->db->order_by('DateOfRez ASC');
        $this->db->limit($limit, $pocetna_rez);
        return $this->db->get()->result_array();
        
    }
    
   
    
     public function BrojNeodobrenihRezervacija(){
        $this->db->where('StatusRez','N');
        return $this->db->count_all_results('rezervacije');
    }
    
     public function dohvatiRezervisane($pocetna_rez,$limit) {
        $this->db->select("r.Tickets, r.DateOfRez, r.StatusRez,k.Name, k.Surname,k.Username, f.OriginalTitle");
        $this->db->from('rezervacije r');
        $this->db->join('korisnici k', 'r.Username=k.Username');
        $this->db->join('projekcije p', 'r.IdProjekcija=p.IdProjekcija');
        $this->db->join('filmovi f', 'f.IdFilm=p.IdFilm');
        $this->db->where('StatusRez','R');
        $this->db->order_by('DateOfRez ASC');
        $this->db->limit($limit, $pocetna_rez);
        return $this->db->get()->result_array();
        
    }
    
    public function BrojOdobrenihRezervacija(){
        $this->db->where('StatusRez','R');
        return $this->db->count_all_results('rezervacije');
    }
    
    public function korisnici($id) {
        
        $this->db->select('*');
        $this->db->from('korisnici');
        $this->db->where('Username', $id);
        return $this->db->get()->result();
    
    
    }
    
    public function update($id, $ime, $prezime, $broj, $mejl, $novip){
        
        $pod = array(
                    'Name' => $ime,
                    'Surname' => $prezime,
                    'Mobile' => $broj,
                    'Email' => $mejl,
                    'Password' => $novip);
        
        $this->db->where('Username', $id);
        $this->db->update('korisnici', $pod);
}

    public function pretraga ($imeKor, $prezimeKor) {
        
        $this->db->select("r.Tickets, r.DateOfRez, r.StatusRez,k.Name, k.Username,k.Surname, f.OriginalTitle");
        $this->db->from('rezervacije r');
        $this->db->join('korisnici k', 'r.Username=k.Username');
        $this->db->join('projekcije p', 'r.IdProjekcija=p.IdProjekcija');
        $this->db->join('filmovi f', 'f.IdFilm=p.IdFilm');
        $this->db->where('StatusRez','N');
        $this->db->group_start();
        $this->db->where('k.Name', $imeKor);
        $this->db->or_where('k.Surname', $prezimeKor);
        $this->db->group_end();
        $this->db->order_by('DateOfRez ASC');
        
        return $this->db->get()->result_array();
     
    }
    
    public function imena ($name) {
        $this->db->select("Name");
        $this->db->from("korisnici");
        $this->db->like('Name',$name);
        return $this->db->get()->result();
       
    }
    
    public function prezimena ($surname) {
        $this->db->select("Surname");
        $this->db->from("korisnici");
        $this->db->like('Surname',$surname);
        return $this->db->get()->result();
        
        
    }
    
    public function pretraga2 ($imeKor, $prezimeKor) {
        
        $this->db->select("r.Tickets, r.DateOfRez, r.StatusRez,k.Name, k.Username,k.Surname, f.OriginalTitle");
        $this->db->from('rezervacije r');
        $this->db->join('korisnici k', 'r.Username=k.Username');
        $this->db->join('projekcije p', 'r.IdProjekcija=p.IdProjekcija');
        $this->db->join('filmovi f', 'f.IdFilm=p.IdFilm');
        $this->db->where('StatusRez','R');
        $this->db->group_start();
        $this->db->where('k.Name', $imeKor);
        $this->db->or_where('k.Surname', $prezimeKor);
        $this->db->group_end();
        $this->db->order_by('DateOfRez ASC');
        
        return $this->db->get()->result_array();
     
    }
    
     public function check_mobile ($username, $broj) {
         $this->db->select('*');
         $this->db->from('korisnici');
         $this->db->where('Mobile', $broj);
         $this->db->where('Username', $username);
         return $this->db->get()->num_rows();
         
         
     }
    
    
    
//  public function dohvatiBroj($id){
//    $this->db->select('Mobile');
//    $this->db->from('korisnici');
//    $this->db->where('Username', $id);
//   
//    $query = $this->db->get();
//    $result = $query->row();
//    return $result->Mobile; 
//}
    
    
}
