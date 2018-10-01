<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advance_bill_model extends CI_Model
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
    public function getAdvance() {
        $cse_username = $this->session->userdata('cse_username');
        $this->db->select("*");
        $this->db->from("advance_bill");
        if($cse_username!=='azizahmed') {
            $this->db->where('submitted_by', $cse_username);
        }
        $this->db->order_by("id desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getBill($bid) {
        $this->db->select("*");
        $this->db->from("advance_bill");
        $this->db->where('id', $bid);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getAllBill() {
        $this->db->select("*");
        $this->db->from("advance_bill");
        $this->db->order_by("id desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function updateBill($data, $bid) {
        $this->db->where('id', $bid);
        $this->db->update('advance_bill', $data);
    }
    function __destruct() {
        $this->db->close();
    }

}