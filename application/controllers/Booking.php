<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Login_model');
        if((($this->session->userdata('cse_role'))!=='Faculty')&&(($this->session->userdata('cse_role'))!=='Officer')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $data['bookings'] = $this->Booking_model->getBooking();
        $this->load->view('common/booking/booking_home_view', $data);
    }
    public function save_booking() {
        $bid='';
        $data = array(
            'bookingby' => $this->input->post('booking_by'),
            'room' => $this->input->post('booking_room'),
            'details' => $this->input->post('booking_detail'),
            'bookingdate' => $this->input->post('booking_date'),
            'bookingfrom' => $this->input->post('booking_from'),
            'bookingto' => $this->input->post('booking_to'),
            'entryby' => $this->session->userdata('cse_username'),
        );
        $checkOverlap=$this->Booking_model->checkOverlap($data, $bid);
        if(empty($checkOverlap)) {
            $err=$this->Booking_model->savBooking($data);
            $data['bookings'] = $this->Booking_model->getBooking();
            if($err==""){
                $to_email='nlnazmul@gmail.com, razi_bd@yahoo.com, mmasroorali@cse.buet.ac.bd, samsul.arifin.dulon@gmail.com, officer4@ugrad.cse.buet.ac.bd, shahinpk89@gmail.com';
                $email_sub='AUTO MAIL: IAC/ROOM or GRADUATE Complex has been booked by '.$data['bookingby'];
                $message='Booking by: '.$data['bookingby'].'<br> Details: '.$data['details'].'<br> Booking date: '.$data['bookingdate'].'<br> Booking from: '.$data['bookingfrom'].'<br> Booking to: '.$data['bookingto'].'<br> Booking Room: '.$data['room'].'<br><br> Note: This is auto e-mail from IAC/ROOM booking page. You have received this mail as you are part of IAC administrator.';
                $response=$this->Login_model->emailSend($to_email, $email_sub, $message);
                if ($response!="") {
                    redirect('booking');
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">You successfully booked. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                    $this->load->view('common/booking/booking_home_view', $data);
                }
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Save Error.<br>' .$err. '<strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                redirect('booking');
            }
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-warning text-center">An event already exist.<strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
            $this->load->view('common/booking/booking_home_view', $data);
        }
    }
    public function edit_booking($id) {
        $data['booking'] = $this->Booking_model->getBookingByID($id);
        $this->load->view('common/booking/booking_edit_view', $data);
    }
    public function update_booking($bid) {
        $data = array(
            'bookingby' => $this->input->post('booking_by'),
            'room' => $this->input->post('booking_room'),
            'details' => $this->input->post('booking_detail'),
            'bookingdate' => $this->input->post('booking_date'),
            'bookingfrom' => $this->input->post('booking_from'),
            'bookingto' => $this->input->post('booking_to'),
            'entryby' => $this->session->userdata('cse_username'),
        );
        $checkOverlap=$this->Booking_model->checkOverlap($data, $bid);
        if(empty($checkOverlap)) {
            $err=$this->Booking_model->updateBooking($data, $bid);
            $data['booking'] = $this->Booking_model->getBookingByID($bid);
            if($err==""){
                $to_email='nlnazmul@gmail.com, razi_bd@yahoo.com, mmasroorali@cse.buet.ac.bd, samsul.arifin.dulon@gmail.com, officer4@ugrad.cse.buet.ac.bd, shahinpk89@gmail.com';
                $email_sub='AUTO MAIL: IAC/ROOM or GRADUATE Complex booking has been updated by '.$data['bookingby'];
                $message='Booking by: '.$data['bookingby'].'<br> Details: '.$data['details'].'<br> Booking date: '.$data['bookingdate'].'<br> Booking from: '.$data['bookingfrom'].'<br> Booking to: '.$data['bookingto'].'<br> Booking Room: '.$data['room'].'<br><br> Note: This is auto e-mail from IAC/ROOM booking page. You have received this mail as you are part of IAC administrator.';
                $response=$this->Login_model->emailSend($to_email, $email_sub, $message);
                if ($response!="") {
                    $this->load->view('common/booking/booking_edit_view', $data);
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Booking updated successfully. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                    $this->load->view('common/booking/booking_edit_view', $data);
                }
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' .$err. '<strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                $this->load->view('common/booking/booking_edit_view', $data);
            }
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-warning text-center">An event already exist. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
            redirect('booking/edit_booking/'.$bid);
        }
    }
}
?>