<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KorisnikModel extends CI_Model{
   
    // 5 najskorijih festivala
    
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
    
    // pretraga festivala i filmova koja nije u upotrebi, odnosi se na pretraga() u kontroleru
    
    public function pretragaFestivala($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv,$prva,$limit){
    
   // SELECT OriginalTitle, SerbianTitle, Date, Time, NameFest, CityName FROM `filmovi` 
   // join projekcije join festivali join gradovi where filmovi.IdFilm=projekcije.IdFilm and 
   // projekcije.IdFest=festivali.IdFest and festivali.IdGrad=gradovi.IdGrad
    
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        if(!empty($imeFest)){
          $this->db->like('NameFest', $imeFest);
        }
        if(!empty($pocetak)){
        $this->db->where('StartDate >', $pocetak);
        }
        if(!empty($zavrsetak)){
        $this->db->where('EndDate <', $zavrsetak);
        }
        if(!empty($engNaziv)){
        $this->db->or_like('OriginalTitle', $engNaziv);
        }
        if(!empty($srbNaziv)){
        $this->db->or_like('SerbianTitle', $srbNaziv);
        }
        $this->db->limit($limit, $prva);
        return $this->db->get()->result();
        
   }     
   
   public function brojRez($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv){
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        if(!empty($imeFest)){
          count(array($this->db->like('NameFest', $imeFest)));
        }
        if(!empty($pocetak)){
        count(array($this->db->where('StartDate >', $pocetak)));
        }
        if(!empty($zavrsetak)){
        count(array($this->db->where('EndDate <', $zavrsetak)));
        }
        if(!empty($engNaziv)){
        count(array($this->db->or_like('OriginalTitle', $engNaziv)));
        }
        if(!empty($srbNaziv)){
        count(array($this->db->or_like('SerbianTitle', $srbNaziv)));
        }
        return $this->db->count_all_results();
   }
   public function brojanjeFesta($imeFest){
       
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        
        if(!empty($imeFest)){
          $this->db->like('NameFest', $imeFest);
        }
          return $this->db->count_all_results();
        
   }
   public function brojDatumP($pocetak){
       
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        
        if(!empty($pocetak)){
        $this->db->where('StartDate >', $pocetak);
        }
          return $this->db->count_all_results();
        
   }
   public function brojDatumK($zavrsetak){
       
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        
         if(!empty($zavrsetak)){
        $this->db->where('EndDate <', $zavrsetak);
        }
          return $this->db->count_all_results();
        
   }
   public function brojEngIme($engNaziv){
       
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        
       if(!empty($engNaziv)){
        $this->db->or_like('OriginalTitle', $engNaziv);
        }
          return $this->db->count_all_results();
        
   }
    public function brojSrbIme($srbNaziv){
       
        $this->db->select('*');
        $this->db->from('filmovi');
        $this->db->join('projekcije', 'filmovi.IdFilm = projekcije.IdFilm');
        $this->db->join('festivali', 'projekcije.IdFest = festivali.IdFest');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        
         if(!empty($srbNaziv)){
        $this->db->or_like('SerbianTitle', $srbNaziv);
        }
          return $this->db->count_all_results();
        
   }
   
// ispis podataka o korisniku na stranici mojNalog
   
public function korisnici($id) {
        
        $this->db->select('*');
        $this->db->from('korisnici');
        $this->db->where('Username', $id);
        return $this->db->get()->result();
    }
    
 // update podataka o korisniku na stranici mojNalog
    
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
 public function updateBez($id, $ime, $prezime, $broj, $mejl, $pass){
        
        $pod = array(
                    'Name' => $ime,
                    'Surname' => $prezime,
                    'Mobile' => $broj,
                    'Email' => $mejl,
                    'Password' => $pass);
        
        $this->db->where('Username', $id);
        $this->db->update('korisnici', $pod);
}

public function dohvatiBroj($id){
    $this->db->select('Mobile');
    $this->db->from('korisnici');
    $this->db->where('Username', $id);
   
    $query = $this->db->get();
    $result = $query->row();
    return $result->Mobile; 
}

public function dohvatiKupljene(){
    
    $this->db->select('*');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "k"');
    
    return $this->db->get()->result_array();
}
public function dohvatiOtkazane(){
    
    $this->db->select('*');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "o"');
    
    return $this->db->get()->result_array();
}

public function dohvatiRezervisane(){
    
    $this->db->select('*');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "r"');
    
    return $this->db->get()->result_array();
}

//public function karte(){
////    SQL upit SELECT * FROM `projekcije` join rezervacije where projekcije.IdProjekcija = rezervacije.IdProjekcija and StatusRez = "R"
//        $this->db->select('Tickets');// IdProjekcija
//        $this->db->from('rezervacije');
//        $this->db->where('StatusRez = "R"');
//        return $this->db->get()->result_array();
//}
//public function ukupnoKarte(){
//    $this->db->select('projekcije.Tickets '); //projekcije.IdProjekcija
//    $this->db->from('projekcije');
//    $this->db->join('rezervacije', 'projekcije.IdProjekcija = rezervacije.IdProjekcija and StatusRez = "R"');
//     return $this->db->get()->result_array();
//}

public function promeniRezervaciju($idRez, $status){
    
    $pod = array('StatusRez' => $status);
    $this->db->where('IdRez', $idRez);
    $this->db->update('rezervacije', $pod);
}

public function vratiKarte($idP, $karte){
//    $pod = array('Tickets' => $karte);
//    $this->db->where('IdProjekcija', $idP);
//    $this->db->update('projekcije', $pod);
}

}