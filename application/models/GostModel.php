<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GostModel
 *
 * @author Danijela
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class GostModel extends CI_Model {
    
    // za pretragu festivala na pocetnoj strani
    
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
