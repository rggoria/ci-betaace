<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Load the model
        $this->load->model('Users_model', 'userdb');
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('email', 'form_validation', 'pagination', 'upload', 'session'));
    }
    public function index(){
        if($this->session->userdata('state') == 'ACTIVE'){
            redirect('Forums');
        }else{
            $data['title'] = "Signup";
            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar');
            $this->load->view('users/signup_view', $data);
            $this->load->view('include/footer');
        }        
    }
    // Signup Validation Function
    public function signup_validation(){
        $required = "This field must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('firstName', 'First Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('lastName', 'Last Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[6]|alpha_numeric|is_unique[tableusers.user_username]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 6 characters',
            'alpha_numeric' => 'Must only contain alpha-numeric characters',
            'is_unique' => 'That username is taken. Try another.'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tableusers.user_email]', array(
            'required' => $required,
            'valid_email' => 'Invalid email format',
            'is_unique' => 'That email is taken. Try another.'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        $this->form_validation->set_rules('confirmPassword', "Confirm Password", 'required|matches[password]|min_length[8]', array (
            'required' => $required,
            'min_length' => 'Must contain at least 8 character',
            'matches' => 'Password does not match'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $firstname = $this->input->post('firstName');
            $lastname = $this->input->post('lastName');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $status = 'USER';
            $state = 'INACTIVE';
            $email_code = md5($username);

            // Get data from inputs
            $data['user_firstname'] = $firstname;        
            $data['user_lastname'] = $lastname;
            $data['user_username'] = $username;
            $data['user_email'] = $email;
            $data['user_password'] = $password;
            $data['user_status'] = $status;
            $data['user_state'] = $state;
            $data['email_code'] = $email_code;
            
            // Email config
            $config_email = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => $this->config->item('email'),
                'smtp_pass' => $this->config->item('password'),
                'smtp_crypto' => 'ssl',
                'mailtype' => 'html',
                'smtp_timeout' => '4',
                'charset' => 'iso-8859-1',
                'newline' => "\r\n",
                'wordwrap' => TRUE
            );
            $this->email->initialize($config_email);
            
            $this->email->from('noreply@email.com', 'Beta Ace');
            $this->email->to($email);            
            $this->email->subject('Verify Email Address');

            $message = '<p>Dear ' . $username . ',</p>';
            $message .= '<p>You are one step away from registering! Please confirm your email.</p>';
            $message .= '<p>Activation Link: <a href="'. site_url('Signup/auth/'.$email_code) .'">Click here</a> </p>';
            $message .= '<p>DO NOT SHARE THIS LINK TO ANYONE!</p>';
            
            $this->email->message($message);
            $this->userdb->create_user($data);
            if ($this->email->send()){
                $this->session->set_flashdata('user_verify', TRUE);
                redirect('Signup/verify');
            }else{
                echo $this->email->print_debugger();
            }
        }        
    }
    // Verify Function
    public function verify(){
        if($this->session->has_userdata('user_verify') == 'TRUE'){
            $data['title'] = "Verify";
            // Load view file
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar');
            $this->load->view('users/verify_view');
            $this->load->view('include/footer');
        }else{
            redirect('Signup');
        }
        
    }
    // Auth Function
    public function auth($email_code){
        $user_exist = $this->userdb->auth_validation($email_code);
        if($user_exist){
            $this->userdb->auth($email_code);
            $this->session->set_flashdata('user_activate', TRUE);
            redirect('Signup/activate/'); 
        }else{
            redirect('Signup');
        }   
    }
    // Activate Function
    public function activate(){
        if($this->session->has_userdata('user_activate') == 'TRUE'){
            $data['title'] = "Activate";
            // Load view file
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar');
            $this->load->view('users/activate_view');
            $this->load->view('include/footer');
            $this->session->unset_userdata('user_activate');
        }else{
            redirect('Signup');
        }
    }
}