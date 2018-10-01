<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studies extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Studies_model');
    }
    /*public function index() {
        $this->load->view('studies/studies_view');
    }*/
    public function ug_studies() {
        $this->load->view('studies/ug_studies_view');
    }
    public function bsc() {
        $this->load->view('studies/bsc_view');
    }
    public function ug_courses() {
        $data['courses'] = $this->Studies_model->getCourse('Undergraduate');
        $this->load->view('studies/ug_courses_view', $data);
    }
    public function ug_courses_level_term($level, $term) {
        $data['courses'] = $this->Studies_model->getCourseLevelTerm('Undergraduate', $level, $term);
        $this->load->view('studies/ug_courses_view', $data);
    }
    public function course_detail($course_id) {
        $data['course_detail'] = $this->Studies_model->getCourseDetail($course_id);
        $this->load->view('studies/courses_detail_view', $data);
    }
    public function advising() {
        $this->load->view('studies/advising_view');
    }
    public function ug_research() {
        $data['thesis'] = $this->Studies_model->getThesisYear('Undergraduate');
        $this->load->view('studies/ug_research_view', $data);
    }
    public function ug_research_year_detail($year) {
        $data['thesis'] = $this->Studies_model->getThesisYear('Undergraduate');
        $data['thesis_detail'] = $this->Studies_model->getThesisYearDetail('Undergraduate', $year);
        $this->load->view('studies/ug_research_year_view', $data);
    }
    public function fund() {
        $this->load->view('studies/fund_view');
    }
    public function ug_eval() {
        $this->load->view('studies/ug_eval_view');
    }
    public function ug_outcome() {
        $this->load->view('studies/ug_outcome_view');
    }
    public function pg_studies() {
        $this->load->view('studies/pg_studies_view');
    }
    public function phd() {
        $this->load->view('studies/phd_view');
    }
    public function msc() {
        $this->load->view('studies/msc_view');
    }
    public function pg_courses() {
        $data['courses'] = $this->Studies_model->getCourse('Graduate');
        $this->load->view('studies/pg_courses_view', $data);
    }
    public function pg_advising() {
        $this->load->view('studies/pg_advising_view');
    }
    public function pg_research() {
        $data['thesis'] = $this->Studies_model->getThesisYear('Graduate');
        $this->load->view('studies/pg_research_view', $data);
    }
    public function pg_research_year_detail($year) {
        $data['thesis'] = $this->Studies_model->getThesisYear('Graduate');
        $data['thesis_detail'] = $this->Studies_model->getThesisYearDetail('Graduate', $year);
        $this->load->view('studies/pg_research_year_view', $data);
    }
    public function pg_eval() {
        $this->load->view('studies/pg_eval_view');
    }
    public function call_for_phd() {
        redirect(base_url().'assets/docs/studies/Call for PHD programme.pdf');
    }
    public function guideline_msc_proposal() {
        $this->load->view('studies/guideline_msc_proposal_view');
    }
}
?>