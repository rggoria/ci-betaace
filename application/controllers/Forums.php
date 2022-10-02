<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forums extends CI_Controller {
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
          redirect('Homepage');
    }
    // Logout User Function
    public function logout_user() {
        $this->session->sess_destroy();
        redirect('Forums');
    }
    // Delete User Function
    public function delete_user($id) {
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['user'] = $this->userdb->get_user($id);
            if($data['user']->user_id == $this->session->userdata('id')){
                $this->session->sess_destroy();       
                $this->userdb->delete_user($id);                
                redirect('Forums');
            }else{
                redirect('Forums');
            }            
        }else{
            redirect('Login');
        }        
    }

    // Add Post Function
    public function add_post(){
        // Load model
        $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['title'] = "Create Post";
            // Load view file
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('posts/add_post_view', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Login');
        }
    }
    // Add Text Post Function
    public function add_text_post_validation(){
        // Load model
        $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('textPostTitle', 'Title', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('textPostDescription', 'Description', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        // Form Validation
        if (!$this->form_validation->run()) {
            $data['error'] = 'There is something wrong on the text tab';
            $data['title'] = "Create Post";
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data_nav);
            $this->load->view('posts/add_post_view', $data);
            $this->load->view('include/footer');
        } else {
            $data['post_title'] = $this->input->post('textPostTitle');
            $data['post_description'] = $this->input->post('textPostDescription');
            $data['post_photo'] = 'NULL';
            $data['user_username'] = $this->session->userdata('username');
            $data['user_id'] = $this->session->userdata('id');

            $this->postdb->add_post($data);
            redirect('Forums');
        }
    }
    
    // Add Photo Post Function
    public function add_photo_post_validation(){
        // Load model
        $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('photoPostTitle', 'Title', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('photoPostDescription', 'Description', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        // Form Validation
        if (!$this->form_validation->run()) {    
            $data['error'] = 'There is something wrong on the photo tab';
            $data['title'] = "Create Post";
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data_nav);
            $this->load->view('posts/add_post_view', $data);
            $this->load->view('include/footer');
        }else{
            /*
            * Configure upload_path, allowed_types, and filename
            * 
            * Load in the upload library
            * Initialize the image
            * 
            * Perform do_upload on the file upload field
            * Create the final uploaded data it in a variable
            */
            $img['image_library'] = 'gd2';
            $img['upload_path'] = './uploads/images/';
            $img['allowed_types'] = 'jpg|jpeg|png|gif';
            $img['file_name'] = $_FILES['postPhoto']['name'];

            //Upload Library
            $this->load->library('upload', $img);
            //Intialize
            $this->upload->initialize($img);

            if( $this->upload->do_upload('postPhoto') ) {
                $uploadData = $this->upload->data();
                $postPhoto = $uploadData['file_name'];
                
                $data['post_title'] = $this->input->post('photoPostTitle');
                $data['post_description'] = $this->input->post('photoPostDescription');
                $data['post_photo'] = $postPhoto;
                $data['user_username'] = $this->session->userdata('username');
                $data['user_id'] = $this->session->userdata('id');

                $this->postdb->add_post($data);
                redirect('Forums');

                
            } else {          
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Create Post";
                $this->load->view('include/header', $data);
                $this->load->view('include/navbar', $data);
                $this->load->view('posts/add_post_view', $data);
                $this->load->view('include/footer');
            }
        }
    }

    // Read Post Function
    public function read_post($id){
        // Load model to fetch data
        $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $data['post'] = $this->postdb->get_post($id);
        $data['comments'] = $this->postdb->get_comment_post($id);
        if(!empty($data['post'])){
            $data['title'] = "Read Post";            
            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data_nav);
            $this->load->view('posts/read_post_view', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Forums');
        }
    }
    // Edit Post Function
    public function edit_post($id){
        if($this->session->userdata('state') == 'ACTIVE'){
            // Load model to fetch data
            $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
            $data['post'] = $this->postdb->get_post($id);
            if(!empty($data['post'])){
                if($data['post']->user_id == $this->session->userdata('id')){
                    $data['title'] = "Edit Post";
                    // Load view file        
                    $this->load->view('include/header', $data);
                    $this->load->view('include/navbar', $data_nav);
                    $this->load->view('posts/edit_post_view', $data);
                    $this->load->view('include/footer');
                }else{
                    redirect('Forums/read_post/'.$data['post']->post_id);
                }
            }else{
                redirect('Forums');
            }
        }else{
            redirect('Login');
        } 
    }
    // Edit Text Post Validation Function
    public function edit_post_validation($id){
        $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('textPostTitle', 'Title', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('textPostDescription', 'Description', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->edit_post($id);
        } else {
            $data['post_title'] = $this->input->post('textPostTitle');
            $data['post_description'] = $this->input->post('textPostDescription');
            // Calls the model and pass the data to the database
            $this->postdb->update_post($id, $data);           
            redirect('Forums');
        }
    }
    // Delete Post Function
    public function delete_post($id) {
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['post'] = $this->postdb->get_post($id);
            if(!empty($data['post'])){
                if(($data['post']->user_id == $this->session->userdata('id')) || ($this->session->userdata('status') == 'ADMIN')){
                    $this->postdb->delete_post($id);                
                    redirect('Forums');
                }else{
                    redirect('Forums/read_post/'.$data['post']->post_id);
                }
            }else{
                redirect('Forums');
            }            
        }else{
            redirect('Login');
        }
        
    }
    // Add Comment Function
    public function add_comment($id){
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['users'] = $this->userdb->get_user($this->session->userdata('id'));      
            $required = "This field is must not be empty";
            $regex_match = "Invalid input. Try another.";
            $this->form_validation->set_rules('addComment', 'Comment', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
                'required' => $required,
                'regex_match' => $regex_match
            ));
            // Form Validation
            if (!$this->form_validation->run()) {
                $this->read_post($id);
            } else {
                // Get data from inputs
                $data_comment = array(                    
                    'comment_description' => $this->input->post('addComment'),
                    'user_username' => $this->session->userdata('username'),
                    'post_id' => $id,                    
                    'user_id' => $this->session->userdata('id')
                );
                // Calls the model and pass the data to the database
                $this->postdb->add_comment($data_comment);
                redirect('Forums/add_comment/'.$id);
            }            
        }else{
            redirect('Login');
        }
    }
    // Edit Comment Function
    public function edit_comment($id){
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['post'] = $this->postdb->get_post($id);
            // Load model to fetch data
            $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
            $data['comment'] = $this->postdb->get_comment($id);
            if(!empty($data['comment'])){
                if($data['comment']->user_id == $this->session->userdata('id')){
                    $data['title'] = "Edit Comment";
                    // Load view file        
                    $this->load->view('include/header', $data);
                    $this->load->view('include/navbar', $data_nav);
                    $this->load->view('posts/edit_comment_view', $data);
                    $this->load->view('include/footer');
                }else{
                    redirect('Forums/read_post/'.$data['comment']->post_id);
                }
            }else{
                redirect('Forums');
            }
        }else{
            redirect('Login');
        }
    }
    // Edit Comment Post Validation Function
    public function edit_comment_validation($comment_id, $post_id){        
        $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";
        $this->form_validation->set_rules('textPostDescription', 'Description', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->edit_comment($comment_id);
        } else {
            $data['comment_description'] = $this->input->post('textPostDescription');
            // Calls the model and pass the data to the database
            $this->postdb->update_comment($comment_id, $data);
            redirect('Forums/read_post/'.$post_id);
        }
    }
    // Delete Post Function
    public function delete_comment($id){
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['post'] = $this->postdb->get_post($id);
            // Load model to fetch data
            $data_nav['users'] = $this->userdb->get_user($this->session->userdata('id'));
            $data['comment'] = $this->postdb->get_comment($id);
            if(!empty($data['comment'])){
                if(($data['comment']->user_id == $this->session->userdata('id')) || ($this->session->userdata('status') == 'ADMIN')){
                    $this->postdb->delete_comment($id);                
                    redirect('Forums/read_post/'.$data['comment']->post_id);
                }else{
                    redirect('Forums/read_post/'.$data['comment']->post_id);
                }
            }else{
                redirect('Forums');
            }            
        }else{
            redirect('Login');
        }
    }
}
?>