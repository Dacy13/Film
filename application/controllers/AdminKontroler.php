<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminKontroler extends CI_Controller {

   public function __construct() {
      parent::__construct();

      $this->load->library('pagination');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->model("AdminModel");
      $this->load->library('upload');

   }

   public function index() {

      $data["middle"] = "middle/admin/admin";
      $this->load->view("basicTemplate", $data);

   }

//  festivali funkcije /////////////////////////////////
   public function festivaliSvi() {

      $IdFest = $this->input->get('id', TRUE); // OVO JE VAZNO; sa ovim je xxx

      $pocetakF = 0;

      if ($this->uri->segment(3)) {

         $pocetakF = $this->uri->segment(3);
      }
      $festivali = $this->AdminModel->sviFestivali();

//      $festivali = $this->AdminModel->sviFestivali($pocetakF, LIMIT_PO_STRANICI);

      $IdFest = $this->input->get('id', TRUE);

//      $this->load->library('pagination');
//
//      $config = $this->config->item('pagination');
//
//      $config['base_url'] = site_url("AdminKontroler/festivaliSvi");
//      $config['total_rows'] = $this->AdminModel->prebrojFestivale();
//      $config['per_page'] = LIMIT_PO_STRANICI;
//
//      $this->pagination->initialize($config);

      $data = ['festivali' => $festivali];
      $this->load->view('middle/admin/festivaliAdmin', $data);
   }

   public function dohvatiFestival($IdFest) {

      $IdFest = $this->input->get('id', TRUE);
      $festivali = $this->AdminModel->dohvatiFestival($IdFest);

      $data = ['festivali' => $festivali];
      $data['middle'] = 'middle/admin/izmeniFest$ival';
//        $this->load->view("basicTemplate", $data);
//        $festival=$this->FestivalModel->dohvatiFestival();
   }

   public function dodajFestival() {

      $lokacije = $this->AdminModel->sviGradovi();
      $data = ['lokacije' => $lokacije];
      $this->load->view('middle/admin/noviFestival', $data);
//        $data['middle']='middle/admin/noviFestival';
//        $this->load->view("basicTemplate", $data);   

      if ($this->input->post('dodajFest')) {

         $ime_festivala = $this->input->post("ime_festivala");
         $od = $this->input->post("od");
         $do = $this->input->post("do");
         $opis = $this->input->post("opis");
         $max_Tickets = $this->input->post("max_Tickets");
         $grad = $this->input->post("gradovi");

//                var_dump($ime_festivala);
//                var_dump($od);
//                var_dump($do);
//                var_dump($opis);
//                var_dump($max_Tickets);
//                var_dump($grad);

         $this->AdminModel->noviFestival($ime_festivala, $od, $do, $opis, $max_Tickets, $grad);
         redirect('AdminKontroler/index');
      }
   }

   public function izmeniFestival() {

      $IdFest = $this->input->get('id', TRUE); // OVO JE VAZNO; sa ovim je bilo OZBILjNOG (by Dejan Jolovic)

      $festival = $this->AdminModel->dohvatiFestival($IdFest);

//        $festival=$this->AdminModel->sviFestivali($IdFest);
//        $projekcije=$this->AdminModel->sveProjekcije($IdFest);
      $lokacije = $this->AdminModel->sviGradovi();

      $data = ['festival' => $festival, 'lokacije' => $lokacije];
//        $data=['lokacije' => $lokacije];  
      $data['middle'] = 'middle/admin/izmeniFestival';
      $this->load->view("basicTemplate", $data);
//      $this->load->view('middle/admin/izmeniFestival', $data);

      if ($this->input->post('izmeniFest')) {

         $IdFest = $this->input->post('hiddenId');
         $ime_festivala = $this->input->post("ime_festivala");
         $od = $this->input->post("od");
         $do = $this->input->post("do");
         $opis = $this->input->post("opis");
         $max_Tickets = $this->input->post("max_Tickets");
         $grad = $this->input->post("hiddenIdG");

//                var_dump($ime_festivala);
//                var_dump($od);
//                var_dump($do);
//                var_dump($opis);
//                var_dump($max_Tickets);
//                var_dump($grad);

         $this->AdminModel->izmeniFestivali($IdFest, $ime_festivala, $od, $do, $opis, $max_Tickets, $grad);
         redirect('AdminKontroler/index');
      }
   }

//  filmovi funkcije //////////////////////////////////////
   public function noviFilm() {

      $data['middle'] = 'middle/admin/noviFilm';
//        $this->load->view("basicTemplate", $data);          
      $this->load->view('middle/admin/noviFilm', $data);

      if ($this->input->post('dodajFilm')) {

         $original = $this->input->post("original");
         $srpski = $this->input->post("srpski");
         $rezija = $this->input->post("rezija");
         $glumci = $this->input->post("glumci");
         $datum = $this->input->post("datum");
         $trajanje = $this->input->post("trajanje");
         $zemlja = $this->input->post("zemlja");
         $opisF = $this->input->post("opisF");
         $imdb = $this->input->post("imdb");
         $poster = $this->input->post("poster");

         $config = $this->config->item('upload');

         $config['upload_path'] = './uploads/' . $original;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);

         if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);

         if (!$this->upload->do_upload("poster")) {

//                    echo "Sllika nije ubacena!";      
            $this->form_validation->set_message('poster', 'Niste upload-ovali sliku!');
         } else {
            $this->upload->data($poster);
            echo 'Weeee';
//                     $this->form_validation->set_message('poster', 'Niste upload-ovali sliku!');
         }

         var_dump("poster");

         $this->AdminModel->noviFilm($original, $srpski, $this->upload->data('file_name'), $datum, $opisF, $rezija, $glumci, $trajanje, $zemlja, $imdb);
         redirect('AdminKontroler/index');
      }
   }

//   projekcije      //////////////////////////
   public function projekcije() {

      $IdFest = $this->input->get('id', TRUE); // OVO JE VAZNO; sa ovim je bilo OZBILjNOG (by Dejan Jolovic)
//       $festival=$this->AdminModel->sviFestivali($IdFest);
      $projekcije = $this->AdminModel->sveProjekcije($IdFest);
      $lokacije = $this->AdminModel->sveLokacije();
//       $data=['lokacije'=>$lokacije];
      $filmovi = $this->AdminModel->sviFilmovi();
      $festivali = $this->AdminModel->sviFestivali();

      $data = ['projekcije' => $projekcije, 'lokacije' => $lokacije, 'filmovi' => $filmovi, 'festivali' => $festivali];
//        $this->load->view('middle/admin/projekcije', $data);  

      $data['middle'] = 'middle/admin/projekcije';
      $this->load->view("basicTemplate", $data);
   }

   public function dodajProjekcije() {

      $IdFest = $this->input->get('id', TRUE);
      $projekcije = $this->AdminModel->sveProjekcije($IdFest);
      $lokacije = $this->AdminModel->sveLokacije();
      $festivali = $this->AdminModel->sviFestivali();

      $data = ['festivali' => $festivali];
      $data = ['lokacije' => $lokacije];
      $data = ['projekcije' => $projekcije];
//      $this->load->view('middle/admin/projekcije');
      $data['middle'] = 'middle/admin/projekcije';
      $this->load->view("basicTemplate", $data);

      if ($this->input->post('dodajP')) {

         $datum = $this->input->post("datum");
         $vreme = $this->input->post("vreme");
         $karata = $this->input->post("karata");
         $fest = $this->input->post("lokacija");
         $film = $this->input->post("film");
         $saleP = $this->input->post("saleP");

//         var_dump($fest);
//         var_dump($film);
//         var_dump($saleP);
//         var_dump($film);
         $this->AdminModel->dodajProjekciju($datum, $vreme, $karata, $fest, $film, $saleP);
//         redirect('AdminKontroler/dodajProjekcije');
      }
   }

   public function projekcijuOtkazi() {
      $idPro = $this->input->post('id');     
      
      $data = ['projekcije' => $projekcije];
      $data['middle'] = 'middle/admin/projekcije';
      $this->load->view("basicTemplate", $data);
    
      
       print_r($idPro);
      $this->AdminModel->otkaziProjekciju($idPro);
      
     
   }

//      korisnik funkcije ////////////s

   public function logout() {

      $this->session->sess_destroy();
      redirect('LoginKontroler');
   }

}

?>
