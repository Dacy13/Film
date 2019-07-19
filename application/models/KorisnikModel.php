<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikModel extends CI_Model{
    
  
    public function korisnici($id) {
        
        $this->db->select();
        $this->db->from('korisnici');
         $this->db->where('Username', $id);
        return $this->db->get()->result();
    }

     public function dohvatiKorisnika($username, $password) {
     
       $query = $this->db->get_where('korisnici', array( 
                                     'username'=>$username, 
                                     'password'=>$password));
                    
        return $query->result_array();
        
        }
   
    //    prikazi 5 festivala
    
    public function prikaziFestivale(){
        
        //SQL upit
        //SELECT NameFest, StartDate, EndDate, Description, Cityname FROM `festivali` 
        //join gradovi where festivali.IdGrad=gradovi.IdGrad 
        //ORDER BY `festivali`.`StartDate` ASC LIMIT 5
                   
        $this->db->select('IdFest, NameFest, StartDate, EndDate, Description, CityName,');
        $this->db->from('festivali');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        $this->db->where("StartDate >= NOW() and EndDate > NOW()" );
        $this->db->order_by('festivali.StartDate', 'ASC');  
        $this->db->limit('5');
        
        $query = $this->db->get();
        
        return $query->result_array();
           
    }  
    
    // pretraga festivala i filmova
    
    public function pretragaFestivala(){
    
   // SELECT OriginalTitle, SerbianTitle, Date, Time, NameFest, CityName FROM `filmovi` 
   // join projekcije join festivali join gradovi where filmovi.IdFilm=projekcije.IdFilm and 
   // projekcije.IdFest=festivali.IdFest and festivali.IdGrad=gradovi.IdGrad
    
    
        $this->db->select('OriginalTitle, SerbianTitle, Date, Time, NameFest, StartDate, EndDate, CityName');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm=projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest=festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
         
        $query = $this->db->get();
        
        return $query->result_array();
    
   
   }     
   
   //za pretragu detalja festivala i filmova
   
   public function search($search){
        
          $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm=projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest=festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        $this->db->like('NameFest',$search);
        $this->db->or_like('CityName',$search);
        $this->db->or_like('StartDate',$search);
        $this->db->or_like('EndDate',$search);
        $this->db->or_like('OriginalTitle',$search);
        $this->db->or_like('SerbianTitle',$search);
        $this->db->or_like('Date',$search);
        $this->db->or_like('Time',$search);
      
        $query = $this->db->get();
        return $query->result();
}
          
}