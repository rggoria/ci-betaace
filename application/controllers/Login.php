<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // Loads the model
        $this->load->model('Users_model', 'userdb');
        // Load the libraries
        $this->load->library(array('form_validation','session'));
        // Load the helpers
        $this->load->helper(array('url', 'form'));
    }
    public function index(){
        if($this->session->userdata('state') == 'ACTIVE'){
            redirect('Forums');            
        }else{
            $data['title'] = "Log In";
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar');
            $this->load->view('users/login_view', $data);
            $this->load->view('include/footer');
        }
    }
    // Login Validation Function
    public function login_validation(){
        $required = "This field is required";
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $this->form_validation->set_rules('username', 'Username', 'required', 'required', $required);
        $this->form_validation->set_rules('password', 'Password', 'required', 'required', $required);
        // Form Validation
        if(!$this->form_validation->run())
            $this->index();
        else{
            $account = $this->userdb->login_verification($username, $password);
            if(isset($account)){
                if($account->user_state == 'ACTIVE'){
                    $session_data = array(                        
                        'id' => $account->user_id,
                        'firstname' => $account->user_firstname,
                        'lastname' => $account->user_lastname,
                        'username' => $account->user_username,
                        'email' => $account->user_email,
                        'password' => $account->user_password,                        
                        'status' => $account->user_status,
                        'state' => $account->user_state
                    );
                    $this->session->set_userdata($session_data);
                    redirect('Forums');
                }else{
                    $data['error'] = 'Account is still INACTIVE ';
                    $data['title'] = "Log In";
                    $this->load->view('include/header', $data);
                    $this->index();
                }
            }else{
                $data['error'] = 'Username or password is not correct.';
                $data['title'] = "Log In";
                $this->load->view('include/header', $data);
                $this->index();
            }
        }
    }
}
?>