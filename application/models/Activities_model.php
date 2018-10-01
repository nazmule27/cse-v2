<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activities_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getNews($type) {
        $this->db->select("*");
        $this->db->from("news");
        $this->db->where('news_area like "%'.$type.'%"');
        $this->db->order_by("news_add_date desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getStudentAchv($type) {
        $this->db->select("*");
        $this->db->from("std_achievement");
        $this->db->order_by("std_achv_date desc");
        $this->db->where("UPPER(std_achv_type)=Upper('$type')");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getStudentAchvDetail($achv_id) {
        $this->db->select("*");
        $this->db->from("std_achievement");
        $this->db->where('std_achv_id', $achv_id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}