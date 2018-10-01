<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
    }
    /*public function index() {
        $data['student'] = $this->Student->getSome(1);
        $this->load->view('student_view', $data);
    }*/
    public function student_notice() {
        $data['student_notice'] = $this->Student_model->getStudentNotice();
        $this->load->view('student_notice_view', $data);
    }
    public function thesis_confirm_report($thesis_id) {
        $data['thesis_report'] = $this->Student_model->getStudentThesis($thesis_id);
        $this->load->view('thesis_confirm_report_view', $data);
    }
}
?>