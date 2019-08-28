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

      $IdFest    = $this->input->get('id', TRUE); 
      $festivali = $this->AdminModel->sviFestivali();


      $data = ['festivali' => $festivali];
      $this->load->view('middle/admin/festivaliAdmin', $data);
   }

   public function dohvatiFestival($IdFest) {

      $IdFest    = $this->input->get('id', TRUE);
      $festivali = $this->AdminModel->dohvatiFestival($IdFest);

      $data = ['festivali' => $festivali];
      $data['middle'] = 'middle/admin/izmeniFest$ival';

   }

   public function dodajFestival() {

      $lokacije = $this->AdminModel->sviGradovi();
      $data = ['lokacije' => $lokacije];
      $this->load->view('middle/admin/noviFestival', $data);

      if ($this->input->post('dodajFest')) {

         $ime_festivala = $this->input->post("ime_festivala");
         $od            = $this->input->post("od");
         $do            = $this->input->post("do");
         $opis          = $this->input->post("opis");
         $max_Tickets   = $this->input->post("max_Tickets");
         $grad          = $this->input->post("gradovi");

         $this->AdminModel->noviFestival($ime_festivala, $od, $do, $opis, $max_Tickets, $grad);
         redirect('AdminKontroler/index');
      }
   }

   public function izmeniFestival() {

      $IdFest   = $this->input->get('id', TRUE); // OVO JE VAZNO; sa ovim je bilo OZBILjNOG (by Dejan Jolovic)
      $festival = $this->AdminModel->dohvatiFestival($IdFest);
      $lokacije = $this->AdminModel->sviGradovi();

      $data = ['festival' => $festival, 'lokacije' => $lokacije];
      $data['middle'] = 'middle/admin/izmeniFestival';
      
      $this->load->view("basicTemplate", $data);

      if ($this->input->post('izmeniFest')) {

         $IdFest        = $this->input->post('hiddenId');
         $ime_festivala = $this->input->post("ime_festivala");
         $od            = $this->input->post("od");
         $do            = $this->input->post("do");
         $opis          = $this->input->post("opis");
         $max_Tickets   = $this->input->post("max_Tickets");
         $grad          = $this->input->post("hiddenIdG");

         $this->AdminModel->izmeniFestivali($IdFest, $ime_festivala, $od, $do, $opis, $max_Tickets, $grad);
         redirect('AdminKontroler/index');
      }
   }

//  filmovi funkcije //////////////////////////////////////
   public function noviFilm() {
       
      $film = $this->AdminModel->sviFilmovi();
      
      $data = ['film' => $film];
      $data['middle'] = 'middle/admin/noviFilm';
         
      $this->load->view('middle/admin/noviFilm', $data);

      if ($this->input->post('dodajFilm')) {

         $original  = $this->input->post("original");
         $srpski    = $this->input->post("srpski");
         $rezija    = $this->input->post("rezija");
         $glumci    = $this->input->post("glumci");
         $datum     = $this->input->post("datum");
         $trajanje  = $this->input->post("trajanje");
         $zemlja    = $this->input->post("zemlja");
         $opisF     = $this->input->post("opisF");
         $imdb      = $this->input->post("imdb");
         $poster    = $this->input->post("poster");

         $config = $this->config->item('upload');

         $config['upload_path'] = './uploads/' . $original;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);

         if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);

         if (!$this->upload->do_upload("poster")) {

//                    echo "Sllika nije ubacena!";      
//            $this->form_validation->set_message('poster', 'Niste upload-ovali sliku!');
         } else {
            $this->upload->data($poster);
//            echo 'Weeee';
//                     $this->form_validation->set_message('poster', 'Niste upload-ovali sliku!');
//            $this->AdminModel->noviFilm($original, $srpski, $this->upload->data('file_name'), $datum, $opisF, $rezija, $glumci, $trajanje, $zemlja, $imdb); ne radi
         }

         $this->AdminModel->noviFilm($original, $srpski, $this->upload->data('file_name'), $datum, $opisF, $rezija, $glumci, $trajanje, $zemlja, $imdb);
         redirect('AdminKontroler/index');
      }
   }

//   projekcije      //////////////////////////
   public function projekcije() {

      $IdFest     = $this->input->get('id', TRUE); // OVO JE VAZNO; sa ovim je bilo OZBILjNOG (by Dejan Jolovic)
      $projekcije = $this->AdminModel->sveProjekcije($IdFest);
      $lokacije   = $this->AdminModel->sveLokacije();
      $filmovi    = $this->AdminModel->sviFilmovi();
      $festivali  = $this->AdminModel->dohvatiFestival($IdFest);
      
      $data = ['projekcije' => $projekcije, 'lokacije' => $lokacije, 'filmovi' => $filmovi, 'festivali' => $festivali];
      $data['middle'] = 'middle/admin/projekcije';
      
      $this->load->view("basicTemplate", $data);
   }

   public function dodajProjekcije() {

      $IdFest     = $this->input->get('id', TRUE);
      $projekcije = $this->AdminModel->sveProjekcije($IdFest);
      $lokacije   = $this->AdminModel->sveLokacije();
      $festivali  = $this->AdminModel->sviFestivali();

      $data = ['festivali' => $festivali];
      $data = ['lokacije' => $lokacije];
      $data = ['projekcije' => $projekcije];
      $data['middle'] = 'middle/admin/projekcije';
      
      $this->load->view("basicTemplate", $data);

      if ($this->input->post('dodajP')) {
          
//         $festId = $this->input->post("hiddenId" );
         $IdFest = $this->input->post('hiddenId');
         $datum  = $this->input->post("datum");
         $vreme  = $this->input->post("vreme");
         $karata = $this->input->post("karata");
         $film   = $this->input->post("film");
         $saleP  = $this->input->post("saleP");
         $cena   = $this->input->post("cena");

         $this->AdminModel->dodajProjekciju($IdFest, $datum, $vreme, $karata, $film, $saleP, $cena);
         redirect('AdminKontroler/index');
      }
   }

//   public function izmeniProjekciju(){
//       
//      $IdFest     = $this->input->get('id', TRUE);
//      $projekcije = $this->AdminModel->sveProjekcije($IdFest);
//      $lokacije   = $this->AdminModel->sveLokacije();
//      $festivali  = $this->AdminModel->sviFestivali();
//
//      $data = ['festivali' => $festivali];
//      $data = ['lokacije' => $lokacije];
//      $data = ['projekcije' => $projekcije];
//      $data['middle'] = 'middle/admin/projekcije';
//      
//      $this->load->view("basicTemplate", $data);
//
//      if ($this->input->post('izmeniP')) {
//          
////         $festId = $this->input->post("hiddenId" );
//         $IdFest = $this->input->post('hiddenId');
//         $datum  = $this->input->post("datum");
//         $vreme  = $this->input->post("vreme");
//         $karata = $this->input->post("karata");
//         $film   = $this->input->post("film");
//         $saleP  = $this->input->post("saleP");
//         $cena   = $this->input->post("cena");
//
//         $this->AdminModel->izmeniProjekciju($IdFest, $datum, $vreme, $karata, $film, $saleP, $cena);
//         redirect('AdminKontroler/index');
//      }
//       
//       
//   }
   
   public function projekcijuOtkazi() {
       
      $idPro = $this->input->post('id');  
           
      $data = ['projekcije' => $projekcije];
      $data['middle'] = 'middle/admin/projekcije';
      $this->load->view("basicTemplate", $data);
      
      $this->AdminModel->otkaziProjekciju($idPro);    
   }  
   
   public function posaljiEmail(){
         // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hablanoabla@gmail.com';
        $mail->Password = 'noablo777hablo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;'********';

        $mail->setFrom('hablanoabla@gmail.com', 'Prodavnica karata za Filmske Festivale');
//        $mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress('aleksandarvelimirovic7@gmail.com');
//        $mail->addAddress('.com');

        // Add cc or bcc 
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = 'Otkazana projekcija';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = 
//        $this->input->post('poruka');
            "<h1>Otazana projekcija</h1>
//           <p>236 red poruka poslata iz kotrolera.</p>";
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    
//   logout   
    public function logout(){
        
        $this->session->sess_destroy();
        redirect('LoginKontroler');
    }
  
}

?>
