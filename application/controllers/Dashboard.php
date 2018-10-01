<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('cse_role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $this->load->view('dashboard_view');
    }

}
?>