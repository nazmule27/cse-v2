<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Officer_acc_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function saveBill($data) {
        $this->db->insert('advance_bill', $data);
    }
    function __destruct() {
        $this->db->close();
    }

}