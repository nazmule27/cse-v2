<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg"> Downloadable Forms</h3>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h4>BUET Central Forms: </h4>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/noc.doc">NOC Form</a><br>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/form_of_group_a_final_2016.pdf">House & Garage form of Group-A</a><br>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/application_form_higher_study.pdf">Application Form for Permission to Higher Study</a><br>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/application_assignment_supervisor_form.pdf">Application Assignment Supervisor Form</a><br>


            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </div>
        <div class="col-md-6 col-sm-6">
            <h4>Departmental Forms: </h4>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/server_access_form.pdf">Server Access Form</a><br>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/sop_format.docx">Statement of Purpose (SOP) Form</a><br>
            <a href="<?=base_url();?>assets/docs/downloadable_forms/pg_student_full_time_reaffirmation">Declaration Form: Employment Status of a Full Time M.Sc./Ph.D. Student</a><br>


            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
