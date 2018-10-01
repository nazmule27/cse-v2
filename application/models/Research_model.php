<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Research_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getResearchArea() {
        $this->db->distinct("research_area");
        $this->db->from("research");
        $this->db->where("parentid",0);
        $this->db->order_by("research_area");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getResearchDetail($r_area) {
        $this->db->select("*");
        $this->db->from("research");
        $this->db->where("research_area",$r_area);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getResearchField($research_id) {
        $this->db->select("*");
        $this->db->from("research");
        $this->db->where("parentid",$research_id);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getResearchFaculty($research_id) {
        $this->db->select("fac_list.fac_login, fac_list.fac_name");
        $this->db->from("fac_list, link_research_fac, research");
        $this->db->where("research.research_id = link_research_fac.link_research");
        $this->db->where("fac_list.fac_login = link_research_fac.link_fac");
        $this->db->where("research.research_id",$research_id);
        $this->db->order_by("fac_joining_date");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getResearchPublication($research_id) {
        $query=$this->db->query("SELECT distinct pid, title, c_j_name, IF(no = '', vol, CONCAT(vol, '(', no, ')')) AS vol, page, month, year, doi FROM pub WHERE pid IN (SELECT pid FROM pub_area 
WHERE research_id IN ( SELECT research_id FROM research WHERE research_id=$research_id OR parentid=$research_id )) ORDER BY ptype desc, year DESC, STR_TO_DATE(month,'%M') desc, pid desc");
        return $result = $query->result();
    }
    public function getAuthors($pid) {
        $this->db->select("*");
        $this->db->from("authors a, author_pub b");
        $this->db->where("a.aid=b.aid");
        $this->db->where("b.pubid",$pid);
        $this->db->order_by("rank");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getPublicationYears() {
        $this->db->distinct("year");
        $this->db->from("pub");
        $this->db->order_by("year desc");
        $query = $this->db->get();
        foreach($query->result_array() as $row){
            $arr[$row['year']]=$row['year'];
        }
        return $arr;
    }
    public function getPublication($year) {
        if($year!=='all') {
            $year_string="AND n.year='$year'";
        }
        else {
            $year_string="";
        }
        $query=$this->db->query("SELECT distinct n.pid, m.authors, n.title, n.c_j_name, IF(n.no = '', vol, CONCAT(vol, '(', no, ')')) AS vol, n.page, n.month, n.year, n.doi  FROM
(SELECT x.pubid, GROUP_CONCAT(' ', x.authors ORDER BY rank) AS authors FROM 
(SELECT rank, b.pubid, CONCAT(a.firstname, ' ', a.lastname) AS authors,  a.aid, a.auid  FROM authors a, author_pub b  WHERE a.aid=b.aid) x GROUP BY x.pubid) m, pub n, (SELECT ap.pubid FROM author_pub ap, authors a WHERE ap.aid=a.aid) o WHERE m.pubid=o.pubid AND m.pubid=n.pid $year_string ORDER BY n.ptype DESC, n.year DESC, STR_TO_DATE(n.month,'%M') desc, n.pid desc");
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}