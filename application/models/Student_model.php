<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getStudentNotice() {
        $this->db->select("notice_id, notice_head, notice_detail, notice_poster, notice_file, notice_cat, notice_time, DATE_FORMAT(notice_time,'%M %d, %Y') AS notice_date, ");
        $this->db->from("notice");
        $this->db->where('notice_cat like "%Student%"');
        $this->db->order_by("notice_time desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getStudentThesis($thesis_id) {
        $this->db->select("*");
        $this->db->from("thesis");
        $this->db->where("thesis_id", $thesis_id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}