<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function getBooking() {
        $this->db->select("*");
        $this->db->from("iac.booking");
        $this->db->where('DATE_ADD(bookingdate,INTERVAL 1 DAY)  >= now()');
        $this->db->order_by("bookingdate desc, bookingfrom");
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function checkOverlap($data, $bid) {
        $selfid='';
        if($bid!==''){
            $selfid= ' and id<>'.$bid;
        }
        $room=$data['room'];
        $bookingdate=$data['bookingdate'];
        $bookingfrom=$data['bookingfrom'];
        $bookingto=$data['bookingto'];
        $query=$this->db->query('SELECT * FROM   iac.booking WHERE  room="'.$room.'" AND bookingdate="'.$bookingdate.'"'.$selfid.'
AND ( bookingfrom BETWEEN "'.$bookingfrom.'" AND "'.$bookingto.'"  OR  bookingto BETWEEN "'.$bookingfrom.'" AND "'.$bookingto.'" OR "'.$bookingfrom.'" BETWEEN bookingfrom AND bookingto OR  "'.$bookingto.'" BETWEEN bookingfrom AND bookingto)');
        return $result = $query->result();
    }
    public function getBookingByID($id) {
        $this->db->select("*");
        $this->db->from("iac.booking");
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function savBooking($data) {
        $this->db->insert('iac.booking', $data);
    }
    public function updateBooking($data, $bid) {
        $this->db->where('id', $bid);
        $this->db->update('iac.booking', $data);
    }
    function __destruct() {
        $this->db->close();
    }

}