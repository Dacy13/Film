<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GostModel extends CI_Model {
    
    // za pretragu festivala na pocetnoj strani
    
 public function dohvatiSveFestivale($imeFestivala, $datumOd, $datumDo) {
     
        $this->db->select('*');
        $this->db->from('festivali f');
        $this->db->join('gradovi g', 'g.IdGrad=f.IdGrad');
        $this->db->like('NameFest',$imeFestivala);
    
        if(!empty($datumOd))
          
            $this->db->where('StartDate >',$datumOd);
     
        if(!empty($datumDo))
          
            $this->db->where('EndDate <',$datumDo);
    
        $query = $this->db->get();
        return $query->result();
    }
}
