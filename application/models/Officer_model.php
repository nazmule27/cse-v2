<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Officer_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getOfficer($status) {
        $this->db->select("*");
        $this->db->from("per_list p");
        $this->db->where('status', $status);
        $this->db->where('per_rank<115');
        $this->db->order_by("per_rank");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getStaff($status) {
        $this->db->select("*");
        $this->db->from("per_list p");
        $this->db->where('status', $status);
        $this->db->where('per_rank>115');
        $this->db->order_by("per_rank");
        $query = $this->db->get();
        return $result = $query->result();
    }
    function __destruct() {
        $this->db->close();
    }

}