<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit extends CI_Controller {
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
    // Edit Function
    public function index(){
        if($this->session->userdata('state') == 'ACTIVE'){
            $data['title'] = "Edit";
            // Load model to fetch data
            $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('users/edit_view', $data);
            $this->load->view('include/footer');
        }else{            
            redirect('Login');
        }
        
    }
    // Edit Validation Function
    public function edit_validation($id){
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";

        $currentPassword = md5($this->input->post('currentPassword'));
        $newPassword = md5($this->input->post('newPassword'));

        $this->form_validation->set_rules('firstName', 'First Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('lastName', 'Last Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|callback_confirm_currentPassword['.$id.']', array(
            'required' => $required,
            'confirm_currentPassword' => "Current Password does not match with the old password"
        ));
        
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|differs[currentPassword]|min_length[8]', array(
            'required' => $required,
            'differs' => "New password must not be the same as the old password",
            'min_length' => 'Must contain at least 8 characters'
        ));

        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|min_length[8]|matches[newPassword]' , array(
            'required' => $required,
            'matches' => "Password does not match",
            'min_length' => 'Must contain at least 8 characters'
        ));
        // Form Validation for changing password
        if(!$this->form_validation->run() || $this->userdb->confirm_password($id, $currentPassword) == 0){
            $this->index();
        }else{            
            $data['user_firstname'] = $this->input->post('firstName');            
            $data['user_lastname'] = $this->input->post('lastName');            
            $data['user_password'] = $newPassword;
            $this->userdb->update_user($id, $data);

            $data['success'] = "Update user success.";
            $data['title'] = "Edit";
            $this->load->view('include/header', $data);
            $this->index();
        }
    }
    // Confirm Current Password Function
    public function confirm_currentPassword($currentPassword, $id) {
        $confirmPassword = md5($currentPassword);
        if ($this->userdb->confirm_password($id, $confirmPassword) !=0 )
            return TRUE;
        return FALSE;
    }
}
?>