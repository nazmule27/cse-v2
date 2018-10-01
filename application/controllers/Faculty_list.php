<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty_list extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Faculty_list_model');
    }
    public function index() {
        $data['faculty_list_professor'] = $this->Faculty_list_model->getFaculty(0,'Professor');
        $data['faculty_list_ac_professor'] = $this->Faculty_list_model->getFaculty(0, 'Associate Professor');
        $data['faculty_list_as_professor'] = $this->Faculty_list_model->getFaculty(0, 'Assistant Professor');
        $data['faculty_list_lecturer'] = $this->Faculty_list_model->getFaculty(0, 'Lecturer');
        $this->load->view('faculty_list_view', $data);
    }
    public function home() {
        $this->load->view('faculty_page_view');
    }
    public function short_list() {
        $data['head'] = $this->Faculty_list_model->getHead('mostofa');
        $data['faculty_list_professor'] = $this->Faculty_list_model->getFaculty(0,'Professor');
        $data['faculty_list_ac_professor'] = $this->Faculty_list_model->getFaculty(0, 'Associate Professor');
        $data['faculty_list_as_professor'] = $this->Faculty_list_model->getFaculty(0, 'Assistant Professor');
        $data['faculty_list_lecturer'] = $this->Faculty_list_model->getFaculty(0, 'Lecturer');
        $this->load->view('faculty_short_view', $data);
    }
    public function detail($fac_login) {
        $data['faculty_detail'] = $this->Faculty_list_model->getFacultyDetail($fac_login);
        $data['faculty_research_area'] = $this->Faculty_list_model->getFacultyResearchArea($fac_login);
        $data['faculty_journal_pub'] = $this->Faculty_list_model->getFacultyPublication($fac_login, 'Journal');
        $data['faculty_conference_pub'] = $this->Faculty_list_model->getFacultyPublication($fac_login, 'Conference');
        $this->load->view('faculty_detail_view', $data);
    }
    public function faculty_on_leave() {
        $data['faculty_list_professor'] = $this->Faculty_list_model->getFaculty(1,'Professor');
        $data['faculty_list_ac_professor'] = $this->Faculty_list_model->getFaculty(1, 'Associate Professor');
        $data['faculty_list_as_professor'] = $this->Faculty_list_model->getFaculty(1, 'Assistant Professor');
        $data['faculty_list_lecturer'] = $this->Faculty_list_model->getFaculty(1, 'Lecturer');
        $this->load->view('faculty_on_leave_view', $data);
    }
    public function faculty_served() {
        $data['faculty_served_list'] = $this->Faculty_list_model->getFacultyServed();
        $this->load->view('faculty_served_view', $data);
    }
}
?>