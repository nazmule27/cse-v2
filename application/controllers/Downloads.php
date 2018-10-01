<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Downloads extends CI_Controller
{
    function __construct() {
        parent::__construct();
        /*$this->load->model('Downloads_model');*/
    }
    public function index() {
        /*$data['news'] = $this->Downloads_model->getForms();*/
        $this->load->view('download_form_view');
    }
    public function class_routine() {
        $this->load->view('class_routine_view');
    }
}
?>