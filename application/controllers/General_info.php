<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_info extends CI_Controller
{
    public function index() {
        $this->load->view('general_info_view');
    }
    public function mission() {
        $this->load->view('mission_view');
    }
    public function history() {
        $this->load->view('history_view');
    }
    public function location() {
        $this->load->view('location_view');
    }
    public function msghead() {
        $this->load->view('msghead_view');
    }
    public function whycse() {
        $this->load->view('whycse_view');
    }
    public function prosstd() {
        $this->load->view('prosstd_view');
    }
    public function current_std() {
        $this->load->view('current_std_view');
    }
    public function registration() {
        $this->load->view('registration_view');
    }
    public function poster() {
        $this->load->view('poster_view');
    }
}
?>