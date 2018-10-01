<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty_list_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getHead($head) {
        $this->db->select("*");
        $this->db->from("fac_list f");
        $this->db->where('fac_login', $head);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getFaculty($status, $deg) {
        $this->db->select("*");
        $this->db->from("fac_list f");
        $this->db->where('fac_on_leave', $status);
        $this->db->where('fac_desig', $deg);
        /*$this->db->where_not_in('fac_login', 'ashikurrahman');*/
        $this->db->order_by("fac_joining_date");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getFacultyDetail($fac_login) {
        $this->db->select("*");
        $this->db->from("fac_list f");
        $this->db->where('fac_login', $fac_login);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getFacultyResearchArea($fac_login) {
        $this->db->select("r.research_id, r.research_area, r.research_desc");
        $this->db->from("link_research_fac l, research r");
        $this->db->where('`r`.research_id = `l`.link_research');
        $this->db->where('`l`.link_fac', $fac_login);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getFacultyPublication($fac_login, $type) {
        $query=$this->db->query("SELECT n.pid, m.authors, n.title, n.c_j_name, IF(n.no = '', vol, CONCAT(vol, '(', NO, ')')) AS vol, n.page, n.year, n.doi  FROM
(SELECT x.pubid, GROUP_CONCAT(' ', x.authors ORDER BY rank) AS authors FROM 
(SELECT rank, b.pubid, CONCAT(a.firstname, ' ', a.lastname) AS authors,  a.aid, a.auid  FROM authors a, author_pub b  WHERE a.aid=b.aid) x GROUP BY x.pubid) m, pub n, (SELECT ap.pubid FROM author_pub ap, authors a WHERE ap.aid=a.aid AND a.auid='$fac_login') o WHERE m.pubid=o.pubid AND m.pubid=n.pid AND n.ptype='$type' ORDER BY n.ptype desc, n.year DESC, n.pid");
        return $result = $query->result();
    }

    public function getFacultyServed() {
        $query=$this->db->query("SELECT `fac_name`, `fac_bangla_name`, `fac_desig` FROM `old_fac_list` WHERE STATUS=0
UNION
SELECT `fac_name`, `fac_bangla_name`, `fac_desig` FROM `fac_list` WHERE `fac_on_leave`=2 ORDER BY fac_name");
        return $result = $query->result();
    }
    function __destruct() {
        $this->db->close();
    }

}