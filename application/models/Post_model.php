<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }
    // Add Post Function
    public function add_post($data) {
        // Create new data to the database
        $this->db->insert('tablepost', $data);
    }
    // Get Post Function
    public function get_post($id){
        $query = $this->db->get_where('tablepost', array('post_id' => $id));
        $result = $query->row();
        return $result;
    }
    // Get All User Function
    public function get_posts($limit, $offset) {
        $this->db->limit($limit, $offset);
        // Fetching/retrieve data from the database
        $this->db->order_by('post_created', 'DESC');        
        return $this->db->get('tablepost')->result();
    }
    // Get Total Row
    public function get_total_row() {
        return $this->db->count_all_results('tablepost');
    }
    // Search Post Function
    public function search($searchWord) {
        $query = $this->db->select('*')
            ->from('tablepost')
            ->like('post_title', $searchWord)
            ->order_by('post_created', 'DESC')
            ->get();
        return $query->result();
    }
    function get_total_row_search($searchWord){
        $query = $this->db->select('*')
            ->from('tablepost')
            ->like('post_title', $searchWord)
            ->get();
        return $query->num_rows();
    }
    // Update Post Function
    public function update_post($id, $data){    
        $this->db->update('tablepost', $data, array('post_id' => $id));
    }
    // Delete Post Function
    public function delete_post($id){        
        $this->db->delete('tablepost', array('post_id' => $id));
    }
    // Add Comment Function
    public function add_comment($data) {
        $this->db->insert('tablecomment', $data);
    }
    // Get All Post Function
    public function get_comments(){
        $this->db->order_by('comment_created', 'DESC');
        return $this->db->get('tablecomment')->result();
    }
    //
    public function get_comment_post($post_id){
        $query = $this->db->select('*')
            ->from ('tablecomment C')
            ->join ('tablepost P', 'C.post_id = P.post_id')
            ->join ('tableusers U', 'C.user_id = U.user_id')
            ->where ('P.post_id', $post_id)
            ->order_by('comment_created', 'DESC')
            ->get();
        return $query->result();
    }
    // Get Comment Function
    public function get_comment($id){
        $query = $this->db->get_where('tablecomment', array('comment_id' => $id));
        $result = $query->row();
        return $result;
    }
    // Update Comment Function
    public function update_comment($id, $data){
        $this->db->update('tablecomment', $data, array('comment_id' => $id));
    }
    // Delete Comment Function
    public function delete_comment($id){        
        $this->db->delete('tablecomment', array('comment_id' => $id));
    }
}
?>