<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Welcome Visitor!</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                CSE welcomes recognized Industrial and Government institutions for technological solutions to any kind of innovative and prospective tasks. The scope of services may include Simulation of real world events to identify or analyze solutions, Arrangement of training sessions for special purpose posts, Modeling of Information Systems, Planning and Policies of recruitment, investigation etc.
                <br>
                <br>
                CSE forms groups or teams of Students and faculties for each of such tasks. A typical group includes Faculties, Students and related officials.
                <br>
                <br>
                Organizations are requested to post their service requirements to the HEAD of CSE BUET for further specialized queries.
                <br>
            </p>
            <p>Please navigate through the following links to find desired informations</p>
            <br>
            <a href="<?=base_url();?>home/all_news"> &raquo; CSE BUET News</a><br>
            <a href="<?=base_url();?>faculty_list/short_list"> &raquo; Faculty List</a><br>

            <a href="<?=base_url();?>activities/consult"> &raquo; Consultation Services</a><br>
            <a href="<?=base_url();?>activities/training"> &raquo; Training</a><br>
            <a href="<?=base_url();?>activities/affiliate"> &raquo; Industrial Affiliation</a><br>

            <br><br>
            <br><br>
            <br>
        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
