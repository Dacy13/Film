<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilmModel extends CI_Model{
    
    public function dohvatiFilm($IdFilm) {
     
       $this->db->select('*');
       $this->db->from('filmovi');
       $this->db->where('IdFilm', $IdFilm);
       
       $query = $this->db->get();
       return $query->result();
    }
   
    public function dohvatiKomentar($IdFilm) {
     
        $this->db->select('*');
        $this->db->from('komentari');
        $this->db->where('IdFilm', $IdFilm);
 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function dohvatiKarte($IdFilm){
       
        $this->db->select('*');
        $this->db->from('projekcije');
        $this->db->where('IdFilm', $IdFilm);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function projekcije($IdFilm){

        $this->db->select('*');
        $this->db->from('filmovi fi');
        $this->db->join('projekcije p', 'fi.IdFilm=p.IdFilm');
        $this->db->join('ulaznice u', 'p.IdProjekcija=u.IdProjekcija');
        $this->db->join('festivali fe', 'p.IdFest=fe.IdFest');
        $this->db->join('gradovi g', 'g.IdGrad=fe.IdGrad');
        $this->db->where('fi.IdFilm',$IdFilm);

        $query = $this->db->get(); 
        return $query->result();
    }
  
    public function dodajKomentar($TekstKomentara, $IdFilm, $Username, $Rating ){

        $this->db->set('TekstKomentara',$TekstKomentara);
        $this->db->set('IdFilm', $IdFilm);
        $this->db->set('Rating', $Rating);
        $this->db->set('Username',$Username);
        $this->db->insert('komentari');
    }
    
public function rezervacija ($StatusRez, $Code, $Tickets, $IdProjekcija, $Username ) {
       
        $this->db->set('DateOfRez', 'NOW()', FALSE);
        $this->db->set('StatusRez', $StatusRez);
        $this->db->set('Code',$Code);
        $this->db->set('Tickets',$Tickets);
        $this->db->set('IdProjekcija',$IdProjekcija);
        $this->db->set('Username',$Username);
        $this->db->insert('rezervacije');
}
public function kupac($Username) {
    
        $this->db->select('*');
        $this->db->from('rezervacije');
        $this->db->where('Username',$Username);
        $this->db->where('StatusRez','KUP');
        
        $query = $this->db->get();
        return $query->result();
}

  public function DohvatiRating($IdFilm) {
      
      $this->db->select ('AVG(Rating) as rating');
      $this->db->from('komentari');
      $this->db->where('IdFilm', $IdFilm);
      $query = $this->db->get();
       return $query->result()[0]->rating;
       
  }

 public function rejting($Rating, $IdFilm, $Username){

        $this->db->set('Rating', $Rating);
        $this->db->set('IdFilm', $IdFilm);
        $this->db->set('Username',$Username);
        $this->db->insert('komentari');
    }


//AJAXXXXX
  
public function SviKomentari($IdFilm){
        
        $this->db->select('*');
        $this->db->from('komentari');
        $this->db->where('TekstKomentara is NOT NULL', NULL, FALSE);
      
        $this->db->where('IdFilm', $IdFilm);
        $query = $this->db->get();
        return $query->result();
       
    }
  
    public function dodajKomentarAjax($TekstKomentara, $IdFilm, $Username){
        
        
        $this->db->set('TekstKomentara',$TekstKomentara);
        $this->db->set('IdFilm', $IdFilm);
        $this->db->set('Username',$Username);
        $this->db->insert('komentari');
   
    }
 
}