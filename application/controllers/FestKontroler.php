<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FestKontroler
 *
 * @author Danijela
 */
class FestKontroler extends CI_Controller {
    
    public function index(){
        
        $data['middle'] = 'middle/fest_info';
        $this->load->view('basicTemplate', $data);
    }
}
