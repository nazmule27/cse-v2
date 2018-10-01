<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller
{
    public function index() {
        $this->load->view('admission_view');
    }
    public function undergraduate() {
        $this->load->view('undergraduate_view');
    }
    public function graduate() {
        $this->load->view('graduate_view');
    }

}
?>