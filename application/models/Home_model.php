<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getNoticeCat() {
        $this->db->distinct("notice_cat");
        $this->db->from("notice");
        $this->db->order_by("notice_cat");
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['notice_cat']]=$row['notice_cat'];
        }
        return $arr;
    }
    public function getNotice() {
        $this->db->select("*");
        $this->db->from("notice");
        $this->db->order_by("notice_time desc");
        $this->db->limit("12");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getResearch() {
        $this->db->select("*");
        $this->db->from("facupdates");
        $this->db->order_by("id desc");
        $this->db->limit("5");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getNews($type) {
        $this->db->select("*");
        $this->db->from("news");
        $this->db->where('news_area like "%'.$type.'%"');
        $this->db->order_by("news_add_date desc");
        $this->db->limit("10");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getAllNews($type) {
        $this->db->select("*");
        $this->db->from("news");
        $this->db->where('news_area like "%%'.$type.'%"');
        $this->db->order_by("news_add_date desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getNewsDetail($news_id) {
        $this->db->select("*");
        $this->db->from("news");
        $this->db->where("news_id",$news_id);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getAllNotice() {
        $this->db->select("*");
        $this->db->from("notice");
        $this->db->order_by("notice_time desc");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getNoticeAjax($cat) {
        if($cat!=='all') {
            $cat = str_replace('-', '/', $cat);
            $cat_string="WHERE notice_cat='$cat'";
        }
        else {
            $cat_string="";
        }
        $query=$this->db->query("select * from notice $cat_string ORDER BY notice_time DESC");
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}