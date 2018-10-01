<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activities extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Activities_model');
    }
    public function index() {
        $data['activities'] = $this->Activities_model->getNews('Activities');
        $this->load->view('activities_view', $data);
    }
    public function buetacm() {
        $this->load->view('activities_buetacm_view');
    }
    public function buetacm_gallery() {
        $this->load->view('activities_buetacm_gallery_view');
    }
    public function progcontest() {
        $data['student_achv'] = $this->Activities_model->getStudentAchv('Programming Contests');
        $this->load->view('progcontest_view', $data);
    }
    public function progcontest_detail($achv_id) {
        $data['student_achv_detail'] = $this->Activities_model->getStudentAchvDetail($achv_id);
        $this->load->view('student_achv_detail_view', $data);
    }
    public function student_proj() {
        $data['student_proj'] = $this->Activities_model->getStudentAchv('Innovative Projects');
        $this->load->view('student_project_view', $data);
    }
    public function student_research() {
        $data['student_research'] = $this->Activities_model->getStudentAchv('Research Activities');
        $this->load->view('student_research_view', $data);
    }
    public function extracurricular() {
        $data['extracurricular'] = $this->Activities_model->getStudentAchv('Extra-curricular Activities');
        $this->load->view('student_extracurricular_view', $data);
    }
    public function seminar() {
        $data['seminar'] = $this->Activities_model->getStudentAchv('Seminar');
        $this->load->view('seminar_view', $data);
    }
    public function indgov() {
        $this->load->view('indgov_view');
    }
    public function consult() {
        $this->load->view('consult_view');
    }
    public function training() {
        $this->load->view('training_view');
    }
    public function affiliate() {
        $this->load->view('affiliate_view');
    }
    public function feature() {
        $this->load->view('feature_view');
    }
    public function self_assessment() {
        $this->load->view('self_assessment_view');
    }
    public function fulbright() {
        $this->load->view('fulbright_view');
    }

}
?>