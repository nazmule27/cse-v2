<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Officer_acc extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Officer_acc_model');
        $this->load->library('session');
        if(($this->session->userdata('cse_role'))!=='Officer') {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $data['advance'] = $this->Officer_acc_model->getAdvance();
        $this->load->view('officer/advance_entry_view', $data);
    }
}
?>