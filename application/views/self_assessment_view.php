<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Self-Assessment Exercise:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <a href="<?=base_url();?>assets/docs/self_assessment/Program_Outline_CSE.docx"> &raquo; CSE Program Outcomes</a><br>
            <a href="<?=base_url();?>assets/docs/self_assessment/Course_Outline_CSE.docx"> &raquo; CSE Course Outline and Lecture Plan Template</a><br>
            <a href="<?=base_url();?>assets/docs/self_assessment/CO_PO_Mapping.docx"> &raquo; Course Learning Outcome to Programme Outcome Mapping</a><br>
            <a href="<?=base_url();?>assets/docs/self_assessment/observ_form.pdf"> &raquo; Class Room Teaching Observtion Report Format</a><br>

            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
