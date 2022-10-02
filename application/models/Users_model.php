<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }
    // Add User Function
    public function create_user($data) {
        // Create new data to the database
        $this->db->insert('tableusers', $data);
    }
    // Login Verification Function
    public function login_verification($username, $password) {
        // Checks the username and password on the database
        $query = $this->db->get_where('tableusers', array(
            'user_username' => $username,
            'user_password' => $password
        ));
        // Gets the result
        return $query->row();
    }
    // Get User Function
    public function get_user($id){
        $query = $this->db->get_where('tableusers', array('user_id' => $id));
        $result = $query->row();
        return $result;
    }    
    // Auth Function
    public function auth($email_code){
        $data = array(
            'user_state' => 'ACTIVE'
        );
        $this->db->where('email_code', $email_code)->update('tableusers', $data);
    }
    public function auth_validation($email_code){
        $query = $this->db->select('*')
            ->from('tableusers')
            ->where('email_code', $email_code)
            ->get();
        return $query->row();
    }

    // Update User Function
    public function update_user($id, $data) {
        $this->db->update('tableusers', $data, array('user_id' => $id));
    }
    // Confirm Password Function
    public function confirm_password($id, $currentPassword) {
        // Gets the user data from the database by id
        $query = $this->db->get_where('tableusers', array(
            'user_id' => $id,
            'user_password' => $currentPassword
        ));
        // Gets the result
        $rowCount = $query->num_rows();
        return $rowCount;
    }

    // View User Function
    public function view_user($id) {
        $query = $this->db->get_where('tableusers', array(
            'user_id' => $id
        ));
        // Gets the result
        $row = $query->row();
        return $row;
    }

    // Delete User Function
    public function delete_user($id){    
        $tables = array('tableusers', 'tablecomment', 'tablepost');
        $this->db->where('user_id', $id);
        $this->db->delete($tables);
        $var = 'DELETE U FROM tableusers U JOIN tablepost P ON U.user_id = P.user_id JOIN tablecomment C ON U.user_id = C.user_id WHERE U.user_id = '.$id.';';
        $this->db->query($var);
    }
}
?>