<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Committee extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
        $this->pdf->fontpath = 'font/';
        $this->load->model('Committee_model');
        $this->Committee =& get_instance();
        if((($this->session->userdata('cse_role'))!=='Admin')&&(($this->session->userdata('cse_role'))!=='Faculty')&&(($this->session->userdata('cse_role'))!=='Officer')) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
    public function index() {
        $data['my_list'] = $this->Committee_model->getMyCommitteeList($this->session->userdata('cse_username'));
        $this->load->view('common/committee/committee_my_list_view', $data);
    }
    public function committee_detail($cid) {
        $data['committee'] = $this->Committee_model->getCommitteeDetail($cid);
        $this->load->view('common/committee/committee_detail_view', $data);
    }
    public function as_complete($cid) {
        $username = $this->session->userdata('cse_username');
        $config['upload_path'] = 'assets/docs/committee/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg';
        $config['file_name'] =$username.'-'.$cid;
        $this->load->library('upload', $config);
        $attachment= $_FILES["attachment"]["name"];
        if($attachment){
            if (!$this->upload->do_upload('attachment')) {
                $upload_error = array('error' => $this->upload->display_errors(), 'committee'=>$this->Committee_model->getCommitteeDetail($cid));
                $this->load->view('common/committee/committee_detail_view', $upload_error);
            }
            else {
                $upload_data = $this->upload->data();
                $data = array(
                    'completedate' => $this->input->post('complete_date'),
                    'reporttext' => $this->input->post('report'),
                    'attachment' => $upload_data['file_name'],
                    'completedsubmission' => date('Y-m-d H:i:s'),
                    'completedby' => $username,
                    'iscomplete' => '1',
                );
                $err=$this->Committee_model->updateCommittee($data, $cid);
                $data['committee'] = $this->Committee_model->getCommitteeDetail($cid);
                if($err==""){
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Successfully marked as completed. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                    $this->load->view('common/committee/committee_detail_view', $data);
                }
                else {
                    $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' .$err. '<strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong> </div>');
                    $this->load->view('common/committee/committee_detail_view', $data);
                }
            }
        }
        else {
            $data = array(
                'completedate' => $this->input->post('complete_date'),
                'reporttext' => $this->input->post('report'),
                'completedsubmission' => date('Y-m-d H:i:s'),
                'completedby' => $username,
                'iscomplete' => '1',
            );
            $err=$this->Committee_model->updateCommittee($data, $cid);
            $data['committee'] = $this->Committee_model->getCommitteeDetail($cid);
            if($err==""){
                $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Successfully marked as completed. <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                $this->load->view('common/committee/committee_detail_view', $data);
            }
            else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Update Error.<br>' .$err. ' <strong><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">  &times;</a> </strong></div>');
                $this->load->view('common/committee/committee_detail_view', $data);
            }
        }
    }
    public function committee_pdf($cid){
        $committee = $this->Committee_model->getCommitteeDetail($cid);
        $members=explode(",", $committee[0]->members);
        $date='Date: '.$committee[0]->sdate;
        $title=$committee[0]->title;
        $notes=$committee[0]->notes;
        $margin='--------------------------------------------';
        $head='Head';
        $dept='Department of Computer Science and Engineering';
        $buet='Bangladesh University of Engineering and Technology';
        $status=$committee[0]->iscomplete;
        if($status=='0') {
            $status='Not Complete';
        }
        else {
            $status='Complete';
        }
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetXY(15,45);
        $this->pdf->cell(0,5,$date,0,0,'R');
        $this->pdf->SetXY(15,60);
        $this->pdf->SetFont('Arial','B',15);
        $this->pdf->cell(0,5,$title,0,0);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->SetXY(15,70);
        $this->pdf->multicell(0,5,$notes,0,5);
        $this->pdf->SetFont('Arial','B',13);
        $this->pdf->SetXY(15,124);
        $this->pdf->multicell(0,5,'Members:',0,5);
        $this->pdf->SetXY(15,130);
        $this->pdf->SetFont('Arial', '', 12);
        $k=130;
        for($i=0; $i < count($members)-1; $i++){
            $this->pdf->SetXY(15,$k);
            $this->pdf->Cell(0,5,($i+1).'. '.$this->Committee->full_name($members[$i]),0,1);
            $k=$k+5;
        }
        $this->pdf->SetXY(15,235);
        $this->pdf->multicell(0,5,$margin,0,5);
        $this->pdf->SetXY(15,240);
        $this->pdf->multicell(0,5,$head,0,5);
        $this->pdf->SetXY(15,245);
        $this->pdf->multicell(0,5,$dept,0,5);
        $this->pdf->SetXY(15,250);
        $this->pdf->multicell(0,5,$buet,0,5);
        $this->pdf->SetXY(15,260);
        $this->pdf->multicell(0,5,'Status: '.$status,0,5);
        $this->pdf->Output('Committee.pdf', 'I');
    }

    public function full_name($username) {
        $data['faculty']=$this->Committee_model->getFacultyNameByUsername($username);
        foreach ($data['faculty'] as $row) {
            if ($row->fac_name==''){
                return $username;
            }
            else {
                return $row->fac_name;
            }
        }
    }
}
?>