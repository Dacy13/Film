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
    
    public function pretragaFestivala($imeFest,$pocetak,$zavrsetak,$engNaziv,$srbNaziv){
    
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
        return $this->db->get()->result();

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

public function dohvatiKarte(){
    
    $this->db->select('*');
    $this->db->from('rezervacije');
    
    return $this->db->get()->result();
    
}

public function dohvatiKupljene(){
    
    $this->db->select('StatusRez');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "k"');
    
    return $this->db->get()->row();
}
public function dohvatiOtkazane(){
    
    $this->db->select('StatusRez');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "o"');
    
    return $this->db->get()->row();
}

public function dohvatiRezervisane(){
    
    $this->db->select('StatusRez');
    $this->db->from('rezervacije');
    $this->db->where('StatusRez = "r"');
    
    return $this->db->get()->row();
}





   // pretraga festivala i filmova sa jednim poljem
   
//   public function search($search){
//        
//          $this->db->select('*');
//        $this->db->from('filmovi');
//        $this->db->join('projekcije', 'filmovi.IdFilm=projekcije.IdFilm');
//        $this->db->join('festivali', 'projekcije.IdFest=festivali.IdFest');
//        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
//        $this->db->like('NameFest',$search);
//        $this->db->or_like('CityName',$search);
//        $this->db->or_like('StartDate',$search);
//        $this->db->or_like('EndDate',$search);
//        $this->db->or_like('OriginalTitle',$search);
//        $this->db->or_like('SerbianTitle',$search);
//        $this->db->or_like('Date',$search);
//        $this->db->or_like('Time',$search);
//      
//        $query = $this->db->get();
//        return $query->result();
//}
   

}