

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load session
    $this->load->library('session');

    // Load model
    $this->load->model('Main_model');

    // Userid 
    $this->session->set_userdata(array("userid"=>3));

  }

  public function index(){

    $data = array();

    // Userid
    $userid = $this->session->userdata('userid');

    // Fetch all records
    $data['posts'] = $this->Main_model->getAllPosts($userid);

    // Load view
    $this->load->view('post_view',$data);
  }

  // Update rating
  public function updateRating(){

    // userid
    $userid = $this->session->userdata('userid');

    // POST values
    $postid = $this->input->post('postid');
    $rating = $this->input->post('rating');

    // Update user rating and get Average rating of a post
    $averageRating = $this->Main_model->userRating($userid,$postid,$rating);

    echo $averageRating;
    exit;
  }

}