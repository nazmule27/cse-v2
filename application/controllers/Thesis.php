<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Thesis extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Thesis_add_model');
        $this->load->library('session');
        if((($this->session->userdata('cse_role'))!=='Admin')&&(($this->session->userdata('cse_role'))!=='Faculty')&&(($this->session->userdata('cse_role'))!=='Officer')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $this->load->view('common/thesis/thesis_entry_view');
    }
    public function save_thesis() {
        $data = array(
            'thesis_type' => $this->input->post('thesis_type'),
            'thesis_date' => $this->input->post('thesis_date'),
            'thesis_students' => $this->input->post('students'),
            'thesis_advisor' => $this->input->post('supervisor'),
            'thesis_title' => $this->input->post('title'),
            'thesis_abs' => $this->input->post('abstract'),
        );
        $checkThesis=$this->Thesis_add_model->checkThesis($data['thesis_title']);
        if(empty($checkThesis)) {
            $err=$this->Thesis_add_model->savThesis($data);
            if($err==""){
                $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Thesis successfully added. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                $this->load->view('common/thesis/thesis_entry_view', $data);
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Save Error.<br>' .$err. '<strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                redirect('thesis_add');
            }
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-warning text-center">Your thesis is not unique. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong> </div>');
            $this->load->view('common/thesis/thesis_entry_view', $data);
        }
    }
}
?>