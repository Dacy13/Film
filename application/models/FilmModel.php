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

     public function projekcija($IdFilm){
        
        $this->db->select('IdProjekcija as idprojekcija');
        $this->db->from('projekcije p');
        $this->db->join('filmovi fi', 'fi.IdFilm=p.IdFilm');
        $this->db->join('festivali fe', 'p.IdFest=fe.IdFest');
        $this->db->where('fi.IdFilm',$IdFilm);

        $query = $this->db->get(); 
        return $query->result()[0]->idprojekcija;
        
      
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

public function ukupanBrojKarata($IdProjekcija) {
   
    $this->db->select ('SUM(Tickets)as Tickets');
    $this->db->from('rezervacije');
    $this->db->where("IdProjekcija",$IdProjekcija)->where("(StatusRez='N' OR StatusRez='R' OR StatusRez='K')");
    $query = $this->db->get();
    return $query->result()[0]->Tickets;
       
}
 public function brojKarataPoProjekciji($IdProjekcija) {
      $this->db->select('Tickets as Tickets');
      $this->db->from('projekcije');
      $this->db->where('IdProjekcija',$IdProjekcija);
      $query = $this->db->get();
      return $query->result()[0]->Tickets;
 }
 
 public function MaxKarataPoFestivalu($IdProjekcija){
     $this->db->select('MaxTickets as MaxTickets');
     $this->db->from('festivali fe');
     $this->db->join('projekcije pr', 'fe.IdFest=pr.IdFest');
     
     $this->db->where('IdProjekcija', $IdProjekcija);
     
     $query = $this->db->get(); 
     return $query->result()[0]->MaxTickets;
     
    
 }
 public function BrojKarataKorisnikaPoFestivalu($Username,$IdFest){
    $this->db->select ('SUM(re.Tickets)as Tickets');
    $this->db->from('rezervacije re');
    $this->db->join('projekcije pr','re.IdProjekcija=pr.IdProjekcija');
    $this->db->join('festivali fe','fe.IdFest=pr.IdFest');
    $this->db->where('Username',$Username);
    $this->db->where('fe.IdFest',$IdFest);
     $this->db->where("(StatusRez='N' OR StatusRez='R' OR StatusRez='K')");
   
    
    
    $query = $this->db->get();
    return $query->result()[0]->Tickets;
     
 }
public function kupac($Username) {
    
        $this->db->select('*');
        $this->db->from('rezervacije');
        $this->db->where('Username',$Username);
        $this->db->where('StatusRez','K');
        
        $query = $this->db->get();
        return $query->result();
}

  public function DohvatiRating($IdFilm) {
      
      $query=$this->db->query ("select avg(Rating) as rating from (SELECT * FROM filmski_festivali.komentari where IdFilm=$IdFilm group by username) x");
 
       return $query->row()->rating;
       
  }

    
    public function rejting($Rating, $IdFilm, $Username){
        $this->db->where('IdFilm', $IdFilm);
        $this->db->where('Username',$Username);
        $this->db->from('komentari');
      if($this->db->count_all_results()>0){
        $this->db->set('Rating', $Rating);
        $this->db->where('Username',$Username);
        $this->db->where('IdFilm', $IdFilm);
        $this->db->update('komentari');
      } else{
        $this->db->set('Rating', $Rating);
        $this->db->set('IdFilm', $IdFilm);
        $this->db->set('Username',$Username);
        $this->db->insert('komentari');
    }
 }

//AJAXXXXX
  
public function SviKomentari($IdFilm){
        
        $this->db->select('*');
        $this->db->from('komentari');
        $this->db->where('TekstKomentara is NOT NULL', NULL, FALSE);
      
        $this->db->where('IdFilm', $IdFilm);
        $this->db->order_by('IdKomentari', 'DESC');
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