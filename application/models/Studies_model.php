<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Studies_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getThesisYear($type) {
        $this->db->select(" distinct YEAR(thesis_date) as thesis_year");
        $this->db->from("thesis");
        $this->db->where("thesis_type",$type);
        $this->db->order_by("YEAR(thesis_date) desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getThesisYearDetail($type, $year) {
        $this->db->select("*");
        $this->db->from("thesis");
        $this->db->where("thesis_type",$type);
        $this->db->where("YEAR(thesis_date)",$year);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getCourse($type) {
        $this->db->select("*");
        $this->db->from("course");
        $this->db->where("course_type",$type);
        $this->db->order_by("course_level, course_term, course_id");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getCourseLevelTerm($type, $level, $term) {
        $this->db->select("*");
        $this->db->from("course");
        $this->db->where("course_type",$type);
        $this->db->where("course_level",$level);
        $this->db->where("course_term",$term);
        $this->db->order_by("course_id");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getCourseDetail($course_id) {
        $this->db->select("*");
        $this->db->from("course");
        $this->db->where("course_id",$course_id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}