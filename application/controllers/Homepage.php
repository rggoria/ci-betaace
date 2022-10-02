<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller {
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
        $data['title'] = "Homepage";
        
        // Pagination config
        $config['base_url'] = site_url('Homepage/index/');
        $config['total_rows'] = $this->postdb->get_total_row();
        $config['per_page'] = 4;

        // Pagination style
        $config['full_tag_open'] = '<ul class="pagination d-flex justify-content-center">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        // Load model to fetch data
        $data['posts'] = $this->postdb->get_posts($config['per_page'], $page);
        $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('forums/homepage_view', $data);
        $this->load->view('include/footer');
    }
}