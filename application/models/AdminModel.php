<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    
// festivali funkcije //////////////////////////////////////////////////////////
//   public function sviFestivali($pocetakF, $limit) {
   public function sviFestivali() {

//        $this->db->select('festivali.Description,NameFest,StartDate,EndDate,MaxTickets,gradovi.CityName,filmovi.OriginalTitle');
//        $this->db->from('festivali');
//        $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
//        $this->db->join('projekcije', 'festivali.IdFest = projekcije.IdFest');
//        $this->db->join('filmovi', 'filmovi.IdFilm = projekcije.IdFilm');

      $this->db->select('IdFest, NameFest, StartDate, EndDate, Description, CityName, MaxTickets');
      $this->db->from('festivali');
      $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
      $this->db->order_by('StartDate', 'DESC');
//      $this->db->limit($limit, $pocetakF);
//        $this->db->where("festivali.IdFest", $IdFest);
      return $this->db->get()->result_array();
   }

   public function prebrojFestivale() {

      return $this->db->count_all_results('festivali');
   }

   public function dohvatiFestival($IdFest) {

      $this->db->select('IdFest, NameFest, StartDate, EndDate, Description, CityName, MaxTickets, gradovi.IdGrad, CityName');
      $this->db->from('festivali');
      $this->db->join('gradovi', 'festivali.IdGrad = gradovi.IdGrad');
      $this->db->where('IdFest', $IdFest);
      $query = $this->db->get();

      return $query->result();
   }

   public function noviFestival($ime_festivala, $od, $do, $opis, $max_Tickets, $grad) {

      $data = [
      "NameFest" => $ime_festivala,
      "StartDate" => $od,
      "EndDate" => $do,
      "Description" => $opis,
      "MaxTickets" => $max_Tickets,
      "idGrad" => $grad
      ];
      var_dump($data);
      return $this->db->insert("festivali", $data);
   }

   public function izmeniFestivali($IdFest, $ime_festivala, $od, $do, $opis, $max_Tickets, $grad) {


      $data = [
//            "IdFest"      => $IdFest,
      "NameFest" => $ime_festivala,
      "StartDate" => $od,
      "EndDate" => $do,
      "Description" => $opis,
      "MaxTickets" => $max_Tickets,
      "idGrad" => $grad
      ];
      var_dump($data);

      $this->db->where("IdFest", $IdFest);
      $this->db->update("festivali", $data);
   }

//  filmovi funkcije //////////////////////////////////////////////////////////
   public function noviFilm($original, $srpski, $poster, $datum, $opisF, $rezija, $glumci, $trajanje, $zemlja, $imdb) {

      $data = [
      "OriginalTitle" => $original,
      "SerbianTitle" => $srpski,
      "Poster" => $poster,
      "Year" => $datum,
      "Description" => $opisF,
      "Director" => $rezija,
      "Actors" => $glumci,
      "Duration" => $trajanje,
      "Country" => $zemlja,
      "IMDB" => $imdb
      ];
      var_dump($data);

      return $this->db->insert("filmovi", $data);
   }

   public function sviFilmovi() {

      $this->db->select('*');
      $this->db->from('filmovi');

      return $this->db->get()->result_array();
   }

//  gradovi i lokacije funkcije 
   public function sviGradovi() {

      $this->db->select('*');
      $this->db->from('gradovi');
      $this->db->order_by('CityName', 'ASC');

      return $this->db->get()->result_array();
   }

   public function sveLokacije() {

      $this->db->select('gradovi.IdGrad, CityName, lokacije.IdLocation, Theater, sale.IdSale,Room ');
      $this->db->from('gradovi');
      $this->db->join('lokacije', ' gradovi.IdGrad = lokacije.IdGrad');
      $this->db->join('sale', ' lokacije.IdLocation = sale.IdLocation ');
//        $this->db->where("festivali.IdGrad", $IdFest);


      return $this->db->get()->result_array();
   }

//  projekcije funkcije //////////////////////////////////////////
    public function sveProjekcije($IdFest) {

        $this->db->select("*");
        $this->db->from("projekcije");
        $this->db->join("filmovi", "filmovi.IdFilm=projekcije.IdFilm");
        $this->db->join("festivali", "festivali.IdFest=projekcije.IdFest");
        $this->db->join("gradovi", "gradovi.IdGrad=festivali.IdGrad");
        $this->db->join("sale", "sale.IdSale=projekcije.IdSale");
        $this->db->join("lokacije", "lokacije.IdLocation=sale.IdLocation");
        $this->db->join("ulaznice", "ulaznice.IdProjekcija = projekcije.IdProjekcija");
        $this->db->where("festivali.IdFest", $IdFest);
        $this->db->order_by('projekcije.Date', 'ASC');

        return $this->db->get()->result_array();
    }

    public function dodajProjekciju($IdFest, $datum, $vreme, $karata, $film, $saleP, $cena) {

        $data = [
            "Date"    => $datum,
            "Time"    => $vreme,
            "Tickets" => $karata,
            "IdFest"  => $IdFest,
            "IdFilm"  => $film,
            "IdSale"  => $saleP
        ];
        $this->db->insert("projekcije", $data);

        $data1 = [
            "Cena" => $cena,
            "IdProjekcija" => $this->db->insert_id()
        ];
        $this->db->insert("ulaznice", $data1);

    }
    
//    public function izmeniProjekciju($IdFest, $datum, $vreme, $karata, $film, $saleP, $cena) {
//
//        $data = [
//            "Date"    => $datum,
//            "Time"    => $vreme,
//            "Tickets" => $karata,
//            "IdFest"  => $IdFest,
//            "IdFilm"  => $film,
//            "IdSale"  => $saleP
//        ];
//        $this->db->update("projekcije", $data);
//
//        $data1 = [
//            "Cena" => $cena,
//            "IdProjekcija" => $this->db->insert_id()
//        ];
//        $this->db->update("ulaznice", $data1);
//
//    }
    

    public function otkaziProjekciju($idPro) {

        $this->db->delete('projekcije', array('IdProjekcija' => $idPro));
    }

}

?>
