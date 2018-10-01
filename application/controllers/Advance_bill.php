<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advance_bill extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Advance_bill_model');
        $this->load->library('session');
        if(($this->session->userdata('cse_role'))!=='Officer') {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $data['advance'] = $this->Advance_bill_model->getAdvance();
        $this->load->view('common/advance/advance_entry_view', $data);
    }
    public function save_bill() {
        $descriptions='';
        $amounts='';
        for($i=1; $i<41; $i++){
            $description = (isset($_POST['description'.$i]) ? $_POST['description'.$i] : null);
            if(!empty($description)){
                $descriptions=$descriptions.$description.'^';
            }
            $amount = (isset($_POST['amount'.$i]) ? $_POST['amount'.$i] : null);
            if(!empty($amount)){
                $amounts=$amounts.$amount.'^';
            }
        }
        $data = array(
            'total_expense' => $this->input->post('total_expense'),
            'in_word' => $this->input->post('in_word'),
            'additional_expense' => $this->input->post('additional_expense'),
            'taken_advance_taka' => $this->input->post('taken_advance_taka'),
            'balanced_taka' => $this->input->post('balanced_taka'),
            'returned_taka' => $this->input->post('returned_taka'),
            'khat_no' => $this->input->post('khat_no'),
            'bank_scroll_no' => $this->input->post('bank_scroll_no'),
            'date' => $this->input->post('date'),
            'extra_taka' => $this->input->post('extra_taka'),
            'expense_description' => $descriptions,
            'amount' => $amounts,
            'total_taka' => $this->input->post('total'),
            'submitted_by' => $this->session->userdata('cse_username'),
        );
        $this->session->set_userdata($data);
        $err=$this->Advance_bill_model->saveBill($data);
        if($err==""){
            $this->load->view('common/advance/submitted_bill_view', $data);
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Insert Error.<br>' .$err. '</div>');
            redirect('Advance_bill/index');
        }
    }
    public function view_bill($bid) {
        $data['bill'] = $this->Advance_bill_model->getBill($bid);
        $this->load->view('common/advance/view_bill_view', $data);
    }
    public function view_all_bill() {
        if((($this->session->userdata('cse_username'))!=='azizahmed')&&(($this->session->userdata('cse_username'))!=='nazmul')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
        $data['bills'] = $this->Advance_bill_model->getAllBill();
        $this->load->view('common/advance/bill_edit_list_view', $data);
    }
    public function edit_bill($bid) {
        if((($this->session->userdata('cse_username'))!=='azizahmed')&&(($this->session->userdata('cse_username'))!=='nazmul')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
        $data['bill'] = $this->Advance_bill_model->getBill($bid);
        $this->load->view('common/advance/edit_bill_view', $data);
    }
    public function update_bill($bid) {
        if((($this->session->userdata('cse_username'))!=='azizahmed')&&(($this->session->userdata('cse_username'))!=='nazmul')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
        $descriptions='';
        $amounts='';
        for($i=1; $i<41; $i++){
            $description = (isset($_POST['description'.$i]) ? $_POST['description'.$i] : null);
            if(!empty($description)){
                $descriptions=$descriptions.$description.'^';
            }
            $amount = (isset($_POST['amount'.$i]) ? $_POST['amount'.$i] : null);
            if(!empty($amount)){
                $amounts=$amounts.$amount.'^';
            }
        }
        $data = array(
            'total_expense' => $this->input->post('total_expense'),
            'in_word' => $this->input->post('in_word'),
            'additional_expense' => $this->input->post('additional_expense'),
            'taken_advance_taka' => $this->input->post('taken_advance_taka'),
            'balanced_taka' => $this->input->post('balanced_taka'),
            'returned_taka' => $this->input->post('returned_taka'),
            'khat_no' => $this->input->post('khat_no'),
            'bank_scroll_no' => $this->input->post('bank_scroll_no'),
            'date' => $this->input->post('date'),
            'extra_taka' => $this->input->post('extra_taka'),
            'expense_description' => $descriptions,
            'amount' => $amounts,
            'total_taka' => $this->input->post('total'),
            'status' => 'Completed',
        );
        $this->session->set_userdata($data);
        $err=$this->Advance_bill_model->updateBill($data, $bid);
        if($err==""){
            $this->load->view('common/advance/submitted_bill_view', $data);
        }
        else {
            $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Insert Error.<br>' .$err. '</div>');
            $this->load->view('common/advance/edit_bill_view', $data);
        }
    }
}
?>