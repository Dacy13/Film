<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FestivalModel extends CI_Model {
   
    public function dohvatiSveFestivale(){
        
        //SQL upit
        //SELECT NameFest, StartDate, EndDate, Description, Cityname FROM `festivali` 
        //join gradovi where festivali.IdGrad=gradovi.IdGrad 
        //ORDER BY `festivali`.`StartDate` ASC LIMIT 5
                   
        $this->db->select('IdFest, NameFest, StartDate, EndDate, Description, CityName,');
        $this->db->from('festivali');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        $this->db->where("StartDate >= NOW() and EndDate > NOW()" );
        $this->db->order_by('festivali.StartDate', 'ASC');
        
        $query = $this->db->get();
        
        return $query->result_array();
        
    }
    
    public function dohvatiFestival($IdFest){
       
        $this->db->select('IdFest, NameFest, StartDate, EndDate, Description, CityName,');
        $this->db->from('festivali');
        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
        $this->db->where('IdFest', $IdFest);
        $query = $this->db->get();
       
        return $query->result();

    }

    public function prikaziProjekciju($IdFest) {    
//  db: filmski_festivali:  tabele:  -----projekcija-----    filmovi       filmovi        gradovi   lokacije sale  filmovi festivali
                //$this->db->select("IdProjekcija, Date, Time, SerbianTitle, OriginalTitle, CityName, Theater, Room, IMDB," /*IdFest"*/);
                $this->db->select("*");
                $this->db->from("projekcije");
                $this->db->join("filmovi", "filmovi.IdFilm=projekcije.IdFilm");
                $this->db->join("festivali", "festivali.IdFest=projekcije.IdFest");        
                $this->db->join("gradovi", "gradovi.IdGrad=festivali.IdGrad");   
                $this->db->join("sale", "sale.IdSale=projekcije.IdSale");
                $this->db->join("lokacije", "lokacije.IdLocation=sale.IdLocation");            
                $this->db->where("festivali.IdFest", $IdFest);
                //$this->db->where("IdProjekcija", $IdProjekcija);
                $this->db->order_by('projekcije.Date', 'ASC');
                //$this->db->order_by('projekcije.Time', 'ASC');
                $query = $this->db->get();
        
        return $query->result();
    }
    
    public function dohvati(){
        
    }

    public function dodajFestival($NameFest, $StartDate, $EndDate, $Description, $MaxTickets, $CityName, $Theater, $Room ) {
        $data = ["NameFest" => $NameFest,
                "StartDate" => $StartDate,
                "EndDate" => $EndDate,
                "Description" => $Description,
                "MaxTickets" => $MaxTickets,
                "CityName" => $CityName,
                "Theater" => $Theater,
                "Room" => $Room,
              
        ];        
        return $this->db->insert("festivali", $data);
    }
    
}
