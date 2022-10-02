<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Post_model' => 'postdb',
            'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    public function index(){
        $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $searchWord = $this->input->post('search');
        if(!empty($searchWord)){
            $data['posts'] = $this->postdb->search($searchWord);
            $data['total'] = $this->postdb->get_total_row_search($searchWord);
            $data['title'] = "Search";
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('forums/search_view', $data);
            $this->load->view('include/footer');
        }else{
            $error = 'Search must not be empty';
            $this->session->set_flashdata('error', $error);
            redirect('Homepage');
        }
    }
}