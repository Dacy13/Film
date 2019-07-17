<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikModel extends CI_Model{
    
 
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
        $this->db->order_by('festivali.StartDate', 'ASC');  
      //  $this->db->where('festivali.IdFest', $idFest);
        $this->db->limit('5');
        
        $query = $this->db->get();
        
        return $query->result_array();
        
        
    }
    
    // pretraga festivala i filmova
    
    public function pretragaFestivala(){
    
   // SELECT OriginalTitle, SerbianTitle, Date, Time, NameFest, CityName FROM `filmovi` 
   // join projekcije join festivali join gradovi where filmovi.IdFilm=projekcije.IdFilm and 
   // projekcije.IdFest=festivali.IdFest and festivali.IdGrad=gradovi.IdGrad
    
    
        $this->db->select('OriginalTitle, SerbianTitle, Date, Time, NameFest, CityName');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm=projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest=festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        $query = $this->db->get();
        
        return $query->result_array();
    
   
   }
     
             
             
        
}