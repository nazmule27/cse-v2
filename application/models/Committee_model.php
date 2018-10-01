<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Committee_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function getMyCommitteeList($user) {
        $this->db->select("*");
        $this->db->from("committee");
        $this->db->where('members like "%'.$user.'%"');
        $this->db->order_by('createdon desc');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getCommitteeDetail($cid) {
        $this->db->select("*");
        $this->db->from("committee");
        $this->db->where('cid', $cid);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function updateCommittee($data, $cid) {
        $this->db->where('cid', $cid);
        $this->db->update('committee', $data);
    }
    public function getFacultyNameByUsername($user) {
        $query=$this->db->query("select * from (SELECT  fac_login,fac_name FROM  `fac_list` UNION  SELECT  per_login as  fac_login  ,per_name as fac_name  FROM `per_list` p, user_info u where p.per_login=u.user_name and u.user_desc='Officer' ) as x  where x.fac_login='$user'");
        return $result = $query->result();
    }

    function __destruct() {
        $this->db->close();
    }

}