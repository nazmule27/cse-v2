<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Officer extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Officer_model');
    }
    public function index() {
        $data['officer'] = $this->Officer_model->getOfficer(1);
        $this->load->view('officer_view', $data);
    }
    public function staff() {
        $data['staff'] = $this->Officer_model->getStaff(1);
        $this->load->view('staff_view', $data);
    }
    public function who_served() {
        $data['officer'] = $this->Officer_model->getOfficer(0);
        $this->load->view('officer_who_served_view', $data);
    }
}
?>