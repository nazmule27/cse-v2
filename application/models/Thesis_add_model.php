<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Thesis_add_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function checkThesis($title) {
        $this->db->select("*");
        $this->db->from("thesis");
        $this->db->where('thesis_title like "%'.$title.'%"');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function savThesis($data) {
        $this->db->insert('thesis', $data);
    }
    function __destruct() {
        $this->db->close();
    }

}